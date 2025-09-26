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
        $this->fee = $payment->fee;
        $this->discount = $payment->discount;
        $this->fee_after_discount = $payment->fee_after_discount;
        $this->total_bill = $payment->total_bill;
        $this->proof_of_payment = $payment->proof_of_payment;
    }

    public function showValidate()
    {
        $this->amount = $this->fee_after_discount;
        $participant = Payment::find($this->paymentValidate)->participant->participant_type;
        if (strpos($participant, 'participant') !== false) {
            $this->for_payment_of = 'Registration Fee of JICEST 2025 as Participant';
        } else {
            $this->for_payment_of = 'Registration Fee of JICEST 2025 as Author';
        }
        $this->dispatchBrowserEvent('show-modal');
    }

    public function valid()
    {
        try {
            \Log::info('Valid function called');
            $this->validate([
                'no_receipt' => 'required',
                'full_name1' => 'required',
                'amount' => 'required',
                'for_payment_of' => 'required'
            ]);
            \Log::info('Validation passed');
        // Optimasi: Eager loading untuk mengurangi query database
        $payment = Payment::with(['participant.user', 'uploadAbstract'])->find($this->paymentValidate);

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
            'receipt' => $this->receiptPath,
            'validated_by' => Auth::user()->email
        ]);


        $linkreceipt = env('APP_URL') . "/storage/" . $this->receiptPath;

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
            
            
            $linkLoa = env('APP_URL') . "/storage/" . $this->loaPath;
            
            UploadAbstract::where('id', $payment->upload_abstract_id)->update([
                'loa' => $this->loaPath,
            ]);
            
            // Queue email untuk menghindari blocking
            Mail::to($this->email, $this->full_name1)->queue(new SendMail('Payment Validation', "<p>
            Dear " . $this->full_name1 . ", <br>
            We have validated your payment for the abstract entitled <strong>" . $abstract->title . "</strong>. Here we include
            your receipt of payment and Letter of Acceptance. <br>
            <a href=" . $linkreceipt . ">Download Receipt</a> <br>
            <a href=" . $linkLoa . ">Download Letter of Acceptance</a>
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
        return view('livewire.payment-validation', [
            'payments' => Payment::where('validation', 'like', '%' . $this->search)->orderBy('created_at')->whereHas('participant', function ($query) {
                $query->where('full_name1', 'like', '%' . $this->search2 . '%');
            })->paginate(10)
        ]);
    }
}
