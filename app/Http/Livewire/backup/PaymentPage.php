<?php

namespace App\Http\Livewire;

use App\Models\Payment;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\UploadAbstract;
use Illuminate\Support\Facades\Auth;

class PaymentPage extends Component
{
    public $fee, $discount, $total_bill, $fee_after_discount, $proof_of_payment;
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

public function add()
{
    $participant = Auth::user()->participant;
    $participantType = $participant->participant_type;
    $attendance = $participant->attendance;

    if ($participantType !== 'participant') {
        $this->abstract = UploadAbstract::where('participant_id', $participant->id)->where('status', 'accepted')->get();
    }

    if ($participantType == 'presenter_reguler') {
        if ($attendance == 'offline') {
            $this->fee = 'IDR 350.000 / $30 USD';
        } else {
            $this->fee = 'IDR 250.000 / $25 USD';
        }
    } elseif ($participantType == 'presenter_student') {
        if ($attendance == 'offline') {
            $this->fee = 'IDR 175.000 / $15 USD';
        } else {
            $this->fee = 'IDR 125.000 / $10 USD';
        }
    } elseif ($participantType == 'participant_reguler') {
        if ($attendance == 'offline') {
            $this->fee = 'IDR 100.000 / $10 USD';
        } else {
            $this->fee = 'IDR 50.000 / $5 USD';
        }
    } elseif ($participantType == 'participant_student') {
        if ($attendance == 'offline') {
            $this->fee = 'IDR 75.000 / $10 USD';
        } else {
            $this->fee = 'IDR 25.000 / $5 USD';
        }
    } else {
        if ($attendance == 'offline') {
            $this->fee = 'IDR 175.000 / $15 USD';
        } else {
            $this->fee = 'IDR 125.000 / $10 USD';
        }
    }



$this->discount = 0; // Tidak ada diskon
$this->fee_after_discount = $this->fee;
$this->total_bill = $this->fee_after_discount;


$this->discount = 0; // Tidak ada diskon
$this->fee_after_discount = $this->fee;
$this->total_bill = $this->fee_after_discount;


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
        $this->validate();
        $imagePath = $this->proof_of_payment->store('images');
        Payment::create([
            'fee' => $this->fee,
            'discount' => $this->discount,
            'fee_after_discount' => $this->fee_after_discount,
            'total_bill' => $this->total_bill,
            'proof_of_payment' => $imagePath,
            'validation' => 'not yet validated',
            'participant_id' => Auth::user()->participant->id,
            'upload_abstract_id' => $this->uploadAbstractId
        ]);

        session()->flash('message', 'Add payment was successful !');
        $this->cancel();
        $this->empty();
    }

    public function render()
    {
        return view('livewire.payment-page', [
            'payments' => Payment::where('participant_id', Auth::user()->participant->id)->latest()->get()
        ]);
    }
}
