<?php

namespace App\Http\Livewire;

use App\Models\Fee;
use App\Models\Payment;
use App\Models\Participant;
use App\Support\RegistrationVoucher;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\UploadAbstract;
use Illuminate\Support\Facades\Auth;

class PaymentPage extends Component
{
    public $fee, $discount, $original_fee, $total_bill, $fee_after_discount, $proof_of_payment, $voucher;
    public $add = false, $edit = false, $payment_edit_id, $abstract_delete_id;
    public $abstract, $uploadAbstractId;

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

    protected function setFeeAmounts(Participant $participant): void
    {
        $fee = Fee::getFeeForParticipant($participant->participant_type, $participant->attendance);
        $discountedFee = RegistrationVoucher::apply($fee, Auth::user()->voucher);

        $this->original_fee = $fee['formatted'];
        $this->fee = $discountedFee['formatted'];
        $this->discount = $discountedFee['discount'];
        $this->fee_after_discount = $this->fee;
        $this->total_bill = $this->fee;
    }



    public function redeem()
    {
        $this->validate([
            'voucher' => 'required|string|max:255',
        ]);
        $this->voucher = RegistrationVoucher::normalize($this->voucher);

        if (!RegistrationVoucher::isValid($this->voucher)) {
            $this->dispatchBrowserEvent('voucher-error', [
                'title' => 'Invalid Voucher',
                'message' => 'The voucher code you entered is not valid. Please check and try again.',
                'icon' => 'error'
            ]);
            return;
        }

        $user = Auth::user();
        $user->voucher = $this->voucher;
        $user->save();

        // Dispatch success event
        $this->dispatchBrowserEvent('voucher-success', [
            'title' => 'Voucher Redeemed!',
            'message' => 'Your 2026 voucher has been applied. Open Add Payment to see the discounted amount.',
            'icon' => 'success'
        ]);

        // Clear the voucher input
        $this->voucher = '';
    }



    public function add()
    {
        $participant = Auth::user()->participant;
        $participantType = $participant->participant_type;

        if ($participantType !== 'participant') {
            $this->abstract = UploadAbstract::where('participant_id', $participant->id)->where('status', 'accepted')->get();
        }

        $this->setFeeAmounts($participant);

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
                $this->setFeeAmounts(Auth::user()->participant);
                $this->validate();
                \Log::info('Payment validation passed');
            $imagePath = $this->proof_of_payment->store('proof-of-payment', config('filesystems.storage'));
            Payment::create([
                'fee' => $this->original_fee,
                'discount' => $this->discount,
                'fee_after_discount' => $this->fee_after_discount,
                'total_bill' => $this->total_bill,
                'proof_of_payment' => $imagePath,
                'validation' => 'not yet validated',
                'participant_id' => Auth::user()->participant->id,
                'upload_abstract_id' => $this->uploadAbstractId
            ]);

            \Log::info('Payment created successfully, dispatching browser event');

            // Dispatch single success event
            $this->dispatchBrowserEvent('payment-success', [
                'title' => 'Payment Submitted Successfully!',
                'message' => 'Your payment has been submitted and is waiting for validation from administrator.',
                'icon' => 'success'
            ]);

            \Log::info('Payment success events dispatched');

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
                'payments' => Payment::where('participant_id', Auth::user()->participant->id)->latest()->get(),
                'pricing' => Fee::getAllPricingTiers(),
            ]);
        }
    }
