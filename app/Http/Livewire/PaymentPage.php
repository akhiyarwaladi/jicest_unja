<?php

namespace App\Http\Livewire;

use App\Models\Fee;
use App\Models\Payment;
use App\Models\Participant;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\UploadAbstract;
use Illuminate\Support\Facades\Auth;

class PaymentPage extends Component
{
    public $fee, $discount, $original_fee, $total_bill, $fee_after_discount, $proof_of_payment, $voucher;
    public $add = false, $edit = false, $payment_edit_id, $abstract_delete_id;
    public $abstract, $uploadAbstractId;
    public $validVouchers = ['JICESTFST50RB', 'JICESTFST100RB'];

    use WithFileUploads;

    public function mount()
    {
        if (!in_array(Auth::user()->participant->participant_type, ['participant', 'participant_reguler', 'participant_student'])) {
            $this->abstract = UploadAbstract::where('participant_id', Auth::user()->participant->id)->where('status', 'accepted')->get();
        }
    }
    public function rules()
    {
        if (in_array(Auth::user()->participant->participant_type, ['participant', 'participant_reguler', 'participant_student'])) {
            return
                [
                    'total_bill' => 'required',
                    'proof_of_payment' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
                ];
        } else {
            return
                [
                    'total_bill' => 'required',
                    'uploadAbstractId' => 'required',
                    'proof_of_payment' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
                ];
        }
    }

    //Custom Errror messages for validation
    protected $messages = [
        'total_bill.required' => 'Total bill is required !',
        'uploadAbstractId.required' => 'Pay for abstract is required !',
        'proof_of_payment.required' => 'Invoice is required !',
    ];

    //Reatime Validation
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function applyDiscount($fee, $amount1, $amount2)
    {
        // Extract the IDR and USD amounts using regular expressions
        preg_match('/IDR ([\d.,]+)/', $fee, $idrMatch);
        preg_match('/\$([\d.]+)/', $fee, $usdMatch);

        // Get the extracted amounts, convert them to numbers, and apply discounts
        $idr = isset($idrMatch[1]) ? floatval(str_replace('.', '', $idrMatch[1])) : 0;
        $usd = isset($usdMatch[1]) ? floatval($usdMatch[1]) : 0;

        // Apply the discount
        $idrDiscounted = max(0, $idr - $amount1);  // Ensure it doesn't go negative
        $usdDiscounted = max(0, $usd - $amount2);

        // Format the results back into a string
        $newFee = 'IDR ' . number_format($idrDiscounted, 0, ',', '.') . ' / $' . number_format($usdDiscounted, 1) . ' USD';

        return $newFee;
    }



    public function redeem()
    {
        // Validate voucher input
        $this->validate([
            'voucher' => 'required|string|max:255',
        ]);

        // List of valid vouchers
        $validVouchers = ['JICESTFST50RB', 'JICESTFST100RB'];

        // Check if the voucher is valid
        if (!in_array($this->voucher, $validVouchers)) {
            $this->dispatchBrowserEvent('voucher-error', [
                'title' => 'Invalid Voucher',
                'message' => 'The voucher code you entered is not valid. Please check and try again.',
                'icon' => 'error'
            ]);
            return;
        }

        // Retrieve the authenticated user
        $user = Auth::user();

        // Update the user's voucher field and save it
        $user->voucher = $this->voucher;
        $user->save();

        // Dispatch success event
        $this->dispatchBrowserEvent('voucher-success', [
            'title' => 'Voucher Redeemed!',
            'message' => 'Your voucher has been successfully applied. Discount will be shown when you add payment.',
            'icon' => 'success'
        ]);

        // Clear the voucher input
        $this->voucher = '';
    }



    public function add()
    {
        $participant = Auth::user()->participant;
        $participantType = $participant->participant_type;
        $attendance = $participant->attendance;

        if ($participantType !== 'participant') {
            $this->abstract = UploadAbstract::where('participant_id', $participant->id)->where('status', 'accepted')->get();
        }

        // Get fee from database using Fee model
        $feeData = Fee::getFeeForParticipant($participantType, $attendance);
        $this->fee = $feeData['formatted'];
        
        $this->original_fee = $this->fee;
        $this->discount = 0; // Tidak ada diskon

        if (Auth::check()) {
            if (Auth::user()->voucher != null) {
                if (Auth::user()->voucher == $this->validVouchers[0]) {
                    $this->fee = $this->applyDiscount($this->fee, 50000, 5);
                    $this->discount = 'IDR 50.000 / USD 5';
                } else {
                    $this->fee = $this->applyDiscount($this->fee, 100000, 10);
                    $this->discount = 'IDR 100.000 / USD 10';
                }
            }
        }



        // $this->discount = 0; // Tidak ada diskon
        $this->fee_after_discount = $this->fee;
        $this->total_bill = $this->fee_after_discount;


        // $this->discount = 0; // Tidak ada diskon
        // $this->fee_after_discount = $this->fee;
        // $this->total_bill = $this->fee_after_discount;


            $this->add = true;
            $this->dispatchBrowserEvent('to-top');
            $this->resetErrorBag();
            $this->resetValidation();
        }

        public function empty()
        {
            $this->payment_edit_id = null;
            $this->fee = null;
            $this->discount = null;
            $this->total_bill = null;
            $this->fee_after_discount = null;
            $this->proof_of_payment = null;
            $this->uploadAbstractId = null;
            $this->edit = false;
        }

        // public function editAbstract($id)
        // {
        //     $abstract = UploadAbstract::find($id);
        //     $this->payment_edit_id = $id;
        //     $this->total_bill = $abstract->total_bill;
        //     $this->fee_after_discount = $abstract->fee_after_discount;
        //     $this->proof_of_payment = $abstract->proof_of_payment;
        //     $this->edit = true;
        // }

        // public function update()
        // {
        //     $this->validate();
        //     Payment::where('id', $this->payment_edit_id)->update([
        //         'total_bill' => $this->total_bill,
        //         'proof_of_payment' => $this->proof_of_payment,
        //     ]);

        //     session()->flash('message', 'Edit abstract was successful !');
        //     $this->empty();
        //     $this->cancel();
        // }

        public function cancel()
        {
            $this->add = false;
            $this->edit = false;
            $this->resetErrorBag();
            $this->resetValidation();
            $this->dispatchBrowserEvent('to-top');
        }

        public function save()
        {
            try {
                \Log::info('Payment save method started');
                $this->validate();
                \Log::info('Payment validation passed');
            $imagePath = $this->proof_of_payment->store('images');
            $discount = 0;
            if (Auth::user()->voucher !== null) {
                if (Auth::user()->voucher == $this->validVouchers[0]) {
                    $discount = 'IDR 50.000 / USD 5';
                } else {
                    $discount = 'IDR 100.000 / USD 10';
                }
            } 
            Payment::create([
                'fee' => $this->original_fee,
                'discount' => $discount,
                'fee_after_discount' => $this->fee_after_discount,
                'total_bill' => $this->total_bill,
                'proof_of_payment' => $imagePath,
                'validation' => 'not yet validated',
                'participant_id' => Auth::user()->participant->id,
                'upload_abstract_id' => $this->uploadAbstractId
            ]);

            \Log::info('Payment created successfully, dispatching browser event');

            $this->dispatchBrowserEvent('payment-success', [
                'title' => 'Payment Submitted Successfully!',
                'message' => 'Your payment has been submitted and is waiting for validation from administrator.',
                'icon' => 'success'
            ]);

            \Log::info('Payment success event dispatched');

            $this->cancel();
            $this->empty();

            } catch (\Exception $e) {
                \Log::error('Payment save error: ' . $e->getMessage());

                $this->dispatchBrowserEvent('payment-error', [
                    'title' => 'Payment Failed',
                    'message' => 'An error occurred while submitting your payment. Please try again.',
                    'icon' => 'error'
                ]);
            }
        }

        public function render()
        {
            return view('livewire.payment-page', [
                'payments' => Payment::where('participant_id', Auth::user()->participant->id)->latest()->get()
            ]);
        }
    }
