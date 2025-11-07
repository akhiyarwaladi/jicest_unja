<?php

namespace App\Http\Livewire;

use App\Mail\SendMail;
use App\Models\UploadAbstract;
use App\Models\Payment;
use Livewire\Component;
use App\Models\Participant;
use Livewire\WithPagination;
use App\Exports\PaymentExport;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use Illuminate\Support\Facades\Storage;

class PaymentValidation extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $validation = false;
    public $full_name1, $email, $participant_type, $payment_for, $fee, $discount, $fee_after_discount, $total_bill, $proof_of_payment, $paymentValidate,$payment;
    public $search = '', $search2 = '';
    public $no_receipt, $for_payment_of, $amount, $receipt, $receiptPath, $loaPath;
    public $date_from = '2025-09-01';
    public $date_to = '';

    // USD display fields (read-only for display purposes)
    public $fee_usd_display = '', $fee_after_discount_usd_display = '';

    // Exchange rate IDR to USD (1 USD = 16500 IDR - adjust as needed)
    private $exchangeRate = 16500;

    // Flag to prevent infinite loop when updating fee
    private $isCalculating = false;

    public function mount()
    {
        $this->date_to = date('Y-m-d');
    }

    public function empty()
    {
        $this->full_name1 = null;
        $this->proof_of_payment = null;
        $this->paymentValidate = null;
        $this->email = null;
        $this->participant_type = null;
        $this->payment_for = null;
        $this->fee = null;
        $this->discount = null;
        $this->fee_after_discount = null;
        $this->total_bill = null;
        $this->proof_of_payment = null;
        $this->payment = null;
    }
    
    public function showDetail($id)
    {
        $this->validation = true;
        $this->paymentValidate = $id;
        $payment = Payment::find($id);
        $this->payment = $payment;
        $this->full_name1 = $payment->participant->full_name1;
        $this->email = $payment->participant->user->email;
        $this->participant_type = $payment->participant->participant_type;
        $this->payment_for = 'participant';
        if ($payment->upload_abstract_id !== null) {
            $this->payment_for = $payment->uploadAbstract->title;
        }
        $this->receipt = $payment->receipt;
        // Leave fee empty for manual input by admin
        $this->fee = '';
        $this->discount = 0;
        $this->fee_after_discount = '';
        $this->total_bill = '';
        $this->proof_of_payment = $payment->proof_of_payment;

        // Initialize USD display
        $this->fee_usd_display = '';
        $this->fee_after_discount_usd_display = '';
    }

    // Extract USD value from format "IDR xxx / $xx USD"
    private function extractUSD($text)
    {
        if (preg_match('/\$([0-9.,]+)\s*USD/i', $text, $matches)) {
            return floatval(str_replace(',', '', $matches[1]));
        }
        return 0;
    }

    // Auto-update USD display and calculate fee after discount when fee/discount changes
    public function updatedFee($value)
    {
        // Prevent infinite loop
        if ($this->isCalculating) {
            return;
        }
        \Log::info('Fee updated: ' . $value);
        $this->updateUSDDisplay();
    }

    public function updatedDiscount($value)
    {
        // Prevent infinite loop
        if ($this->isCalculating) {
            return;
        }
        \Log::info('Discount updated: ' . $value);
        $this->updateUSDDisplay();
    }

    public function updateUSDDisplay()
    {
        \Log::info('updateUSDDisplay called');
        \Log::info('Fee: ' . $this->fee);
        \Log::info('Discount: ' . $this->discount);

        // Parse fee and discount - only keep digits (don't modify the original fields!)
        $feeIDR = floatval(preg_replace('/[^0-9]/', '', $this->fee));
        $discountIDR = floatval(preg_replace('/[^0-9]/', '', $this->discount));

        // Convert to USD using exchange rate
        $feeUSD = $feeIDR > 0 ? round($feeIDR / $this->exchangeRate, 2) : 0;
        $discountUSD = $discountIDR > 0 ? round($discountIDR / $this->exchangeRate, 2) : 0;

        \Log::info("Parsed - Fee IDR: $feeIDR, Fee USD: $feeUSD, Discount IDR: $discountIDR, Discount USD: $discountUSD");

        // Calculate fee after discount
        $feeAfterDiscountIDR = max(0, $feeIDR - $discountIDR);
        $feeAfterDiscountUSD = max(0, $feeUSD - $discountUSD);

        \Log::info("Calculated - After Discount IDR: $feeAfterDiscountIDR, After Discount USD: $feeAfterDiscountUSD");

        // ONLY update fee_after_discount and total_bill (DO NOT modify fee and discount fields)
        if ($feeAfterDiscountIDR > 0 || $feeAfterDiscountUSD > 0) {
            $this->fee_after_discount = 'IDR ' . number_format($feeAfterDiscountIDR, 0, '', '') . ' / $' . number_format($feeAfterDiscountUSD, 2, '.', '') . ' USD';
            $this->total_bill = $this->fee_after_discount;

            // Update USD display fields for visual feedback
            $this->fee_usd_display = '$' . number_format($feeUSD, 2) . ' USD';
            $this->fee_after_discount_usd_display = '$' . number_format($feeAfterDiscountUSD, 2) . ' USD';
        } else {
            $this->fee_after_discount = '';
            $this->total_bill = '';
            $this->fee_usd_display = '';
            $this->fee_after_discount_usd_display = '';
        }

        \Log::info('Fee After Discount: ' . $this->fee_after_discount);
    }

    // Extract IDR value from format "IDR xxx.xxx / $xx USD"
    private function extractIDR($text)
    {
        if (preg_match('/IDR\s*([0-9.,]+)/i', $text, $matches)) {
            return floatval(str_replace(['.', ','], '', $matches[1]));
        }
        return 0;
    }

    public function showValidate()
    {
        // Use fee_after_discount as-is for amount
        $this->amount = $this->fee_after_discount;
        $participant = Payment::find($this->paymentValidate)->participant->participant_type;
        if (strpos($participant, 'participant') !== false) {
            $this->for_payment_of = 'Registration Fee of JICEST 2025 as Participant';
        } else {
            $this->for_payment_of = 'Registration Fee of JICEST 2025 as Author';
        }

        // Auto-generate receipt number
        $this->no_receipt = $this->generateReceiptNumber();

        $this->dispatchBrowserEvent('show-modal');
    }

    /**
     * Generate unique receipt number with database locking (OPTIMIZED)
     * Format: JICEST/2025/MMDD/XXXX
     * Performance: Only checks today's records (~100-1000 rows max per day)
     */
    private function generateReceiptNumber()
    {
        return \DB::transaction(function () {
            $year = date('Y');
            $monthDay = date('md'); // Format: MMDD
            $prefix = "JICEST/{$year}/{$monthDay}";

            // OPTIMIZED: Only check TODAY's records (not all historical data)
            // This limits the search to ~100-1000 records max per day instead of millions
            $lastPayment = Payment::whereNotNull('receipt')
                                  ->where('receipt', 'LIKE', "{$prefix}/%")
                                  ->whereDate('updated_at', today()) // IMPORTANT: Only today's data
                                  ->lockForUpdate() // Lock rows to prevent race condition
                                  ->orderByRaw("CAST(SUBSTRING_INDEX(receipt, '/', -1) AS UNSIGNED) DESC")
                                  ->first();

            if ($lastPayment && $lastPayment->receipt) {
                // Extract the sequence number from receipt format: JICEST/2025/1107/0001
                $parts = explode('/', $lastPayment->receipt);
                $lastSequence = intval(end($parts));
                $sequence = str_pad($lastSequence + 1, 4, '0', STR_PAD_LEFT);
            } else {
                $sequence = '0001';
            }

            $receiptNumber = "{$prefix}/{$sequence}";

            \Log::info("Generated receipt number: {$receiptNumber}");

            return $receiptNumber;
        });
    }

    public function valid()
    {
        try {
            \Log::info('Valid function called');
            $this->validate([
                'no_receipt' => 'required',
                'full_name1' => 'required',
                'amount' => 'required',
                'for_payment_of' => 'required',
                'fee' => 'required',
                'discount' => 'nullable',
                'fee_after_discount' => 'required',
                'total_bill' => 'required'
            ]);
            \Log::info('Validation passed');

            // OPTIMIZED: Check if receipt number already exists (for manually edited receipts)
            // Only check recent records (last 30 days) to improve performance
            $existingReceipt = Payment::where('id', '!=', $this->paymentValidate)
                                     ->where('receipt', 'LIKE', "%{$this->no_receipt}%")
                                     ->where('updated_at', '>=', now()->subDays(30)) // Only check last 30 days
                                     ->first();

            if ($existingReceipt) {
                \Log::warning("Duplicate receipt number detected: {$this->no_receipt}");

                // Auto-regenerate new unique receipt number
                $this->no_receipt = $this->generateReceiptNumber();

                $this->dispatchBrowserEvent('validation-error', [
                    'title' => 'Duplicate Receipt Number',
                    'message' => "Receipt number already exists! Auto-generated new number: {$this->no_receipt}. Please click Valid again.",
                    'icon' => 'warning'
                ]);
                return;
            }
        // Optimasi: Eager loading untuk mengurangi query database
        $payment = Payment::with(['participant.user', 'uploadAbstract'])->find($this->paymentValidate);

        // Update payment dengan nilai fee yang sudah diedit admin (simpan as-is)
        Payment::where('id', $this->paymentValidate)->update([
            'fee' => $this->fee,
            'discount' => $this->discount ?? '0',
            'fee_after_discount' => $this->fee_after_discount,
            'total_bill' => $this->total_bill,
        ]);

        // Optimasi PDF: Enable local files untuk gambar
        $receipt = PDF::loadView('administrator.pdf.receipt', [
            'full_name' => $this->full_name1,
            'fee' => $this->amount,
            'receipt_no' => $this->no_receipt,
            'payment_for' => $this->for_payment_of
        ])->setPaper('a4', 'potrait')
        ->setOptions([
            'isHtml5ParserEnabled' => true,
            'isRemoteEnabled' => false,
            'isPhpEnabled' => true,
            'chroot' => public_path()
        ]);

        $abstract = $payment->uploadAbstract;
        if ($abstract) {
            $id = $abstract->id;
        } else {
            $id = 'participant';
        }
        Storage::disk(config('filesystems.storage'))->put('receipt/' . 'receipt-abs-' . $id . '-' . $this->full_name1 . '.pdf', $receipt->output());
        $this->receiptPath = 'receipt/' . 'receipt-abs-' . $id . '-' . $this->full_name1 . '.pdf';
        Payment::where('id', $this->paymentValidate)->update([
            'validation' => 'valid',
            'receipt' => $this->no_receipt,  // Save receipt NUMBER, not path!
            'validated_by' => Auth::user()->email
        ]);


        $linkreceipt = url('storage/' . $this->receiptPath);

        if ($abstract) {
            // Menggunakan data dari eager loading
            $currentUser = $payment->participant;

            $loa = PDF::loadView('administrator.pdf.loa', [
                'full_name' => $this->full_name1,
                'institution' => $currentUser->institution,
                'abstractTitle' => $abstract->title,
            ])->setPaper('a4', 'potrait')
            ->setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => false]);
            Storage::disk(config('filesystems.storage'))->put('letter-of-acceptance/' . 'LOA-ABS' . $payment->upload_abstract_id . '-' . $this->full_name1 . '.pdf', $loa->output());
            $this->loaPath = 'letter-of-acceptance/' . 'LOA-ABS' . $payment->upload_abstract_id . '-' . $this->full_name1 . '.pdf';
            
            
            $linkLoa = url('storage/' . $this->loaPath);
            
            UploadAbstract::where('id', $payment->upload_abstract_id)->update([
                'loa' => $this->loaPath,
            ]);
            
            // Queue email untuk menghindari blocking
            Mail::to($this->email, $this->full_name1)->queue(new SendMail('Payment Validation', "<p>
            Dear " . $this->full_name1 . ", <br>
            We have validated your payment for the abstract entitled <strong>" . $abstract->title . "</strong>. Here we include
            your receipt of payment and Letter of Acceptance. <br><br>
            <a href=\"" . $linkreceipt . "\" style=\"color: #007bff; text-decoration: underline;\">Download Receipt</a> <br>
            <a href=\"" . $linkLoa . "\" style=\"color: #007bff; text-decoration: underline;\">Download Letter of Acceptance</a>
            <br> <br>
            Warm regards, <br><br><br><br>
            Steering Committee JICEST 2025 </p>"));
        } else {
            // Queue email untuk menghindari blocking
            Mail::to($this->email, $this->full_name1)->queue(new SendMail('Payment Validation', "<p>
            Dear " . $this->full_name1 . ", <br>
            We have validated your payment for the participant JICEST 2025, here we include
            your receipt of payment. <br>
            Warm regards, <br><br><br><br>
            Steering Committee JICEST 2025 </p>"));
        }

        \Log::info('Validation completed successfully');

        // Close modal dulu, baru tampilkan success alert
        $this->dispatchBrowserEvent('close-modal');
        $this->validation = false;

        // Emit Sweet Alert setelah modal tertutup (dengan delay)
        $this->dispatchBrowserEvent('validation-success', [
            'title' => 'Validation Successful!',
            'message' => 'Payment has been validated successfully. Receipt and email have been sent to the participant.',
            'icon' => 'success'
        ]);
        } catch (\Exception $e) {
            \Log::error('Error in valid function: ' . $e->getMessage());

            $this->dispatchBrowserEvent('validation-error', [
                'title' => 'Validation Failed',
                'message' => 'An error occurred during validation. Please try again or contact administrator.',
                'icon' => 'error'
            ]);
            return;
        }
    }

    public function back()
    {
        $this->validation = false;

        $this->dispatchBrowserEvent('to-top');
    }

    public function invalid()
    {
        try {
            $participant_id = Payment::find($this->paymentValidate)->participant_id;
            $email = Participant::find($participant_id)->user->email;
            
            Payment::where('id', $this->paymentValidate)->update([
                'validation' => 'invalid',
                'validated_by' => Auth::user()->email
            ]);
            
            Mail::to($email)->send(new SendMail('Payment Validation', 'Your payment for ' . $this->for_payment_of . ' is invalid!', []));

            $this->validation = false;

            // Show success alert for invalid payment marking
            $this->dispatchBrowserEvent('validation-success', [
                'title' => 'Payment Marked Invalid!',
                'message' => 'Payment has been marked as invalid and notification email sent to participant.',
                'icon' => 'warning'
            ]);
        } catch (\Exception $e) {
            \Log::error('Error marking payment as invalid: ' . $e->getMessage());

            $this->dispatchBrowserEvent('validation-error', [
                'title' => 'Operation Failed',
                'message' => 'An error occurred while marking payment as invalid. Please try again.',
                'icon' => 'error'
            ]);
        }
    }

    public function export()
    {
        return Excel::download(new PaymentExport(), 'All Payment JICEST 2025.xlsx');
    }

    public function render()
    {
        $query = Payment::where('validation', 'like', '%' . $this->search)->whereHas('participant', function ($query) {
            $query->where('full_name1', 'like', '%' . $this->search2 . '%');
        });

        if ($this->date_from) {
            $query->whereDate('created_at', '>=', $this->date_from);
        }

        if ($this->date_to) {
            $query->whereDate('created_at', '<=', $this->date_to);
        }

        return view('livewire.payment-validation', [
            'payments' => $query->orderBy('created_at')->paginate(10)
        ]);
    }
}
