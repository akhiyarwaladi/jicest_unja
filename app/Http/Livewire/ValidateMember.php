<?php

namespace App\Http\Livewire;

use App\Mail\SendMail;
use Livewire\Component;
use App\Models\Participant;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ValidateMember extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $full_name1, $hki_id, $member_card, $memberValidate;
    public $search = '', $search2 = '';

    public function empty()
    {
        $this->full_name1 = null;
        $this->member_card = null;
        $this->memberValidate = null;
        $this->hki_id = null;
    }
    public function showValidate($id)
    {
        $this->memberValidate = $id;
        $participant = Participant::find($id);
        $this->full_name1 = $participant->full_name1;
        $this->hki_id = $participant->hki_id;
        $this->member_card = $participant->member_card;
        $this->dispatchBrowserEvent('show-modal');
    }

    public function valid()
    {
        try {
            $email = Participant::find($this->memberValidate)->user->email;
            
            Participant::where('id', $this->memberValidate)->update([
                'hki_status' => 'valid',
                'hki_validated_by' => Auth::user()->email
            ]);
            
            Mail::to($email)->send(new SendMail('Validation HKI Member', 'Your hki member status has been validated, now you get a 25% discount'));
            
            $this->empty();
            $this->dispatchBrowserEvent('close-modal');
            
            $this->dispatchBrowserEvent('hki-validation-success', [
                'title' => 'HKI Member Validated!',
                'message' => 'HKI membership has been validated successfully. Member now gets 25% discount.',
                'icon' => 'success'
            ]);
        } catch (\Exception $e) {
            \Log::error('Error validating HKI member: ' . $e->getMessage());

            $this->dispatchBrowserEvent('hki-validation-error', [
                'title' => 'Validation Failed',
                'message' => 'An error occurred while validating HKI membership. Please try again.',
                'icon' => 'error'
            ]);
        }
    }

    public function invalid()
    {
        try {
            $email = Participant::find($this->memberValidate)->user->email;
            
            Participant::where('id', $this->memberValidate)->update([
                'hki_status' => 'invalid',
                'hki_validated_by' => Auth::user()->email
            ]);
            
            Mail::to($email)->send(new SendMail('Validation HKI Member', "Your hki member status is invalid, you don't get 25% discount."));
            
            $this->empty();
            $this->dispatchBrowserEvent('close-modal');
            
            $this->dispatchBrowserEvent('hki-validation-success', [
                'title' => 'HKI Member Marked Invalid!',
                'message' => 'HKI membership has been marked as invalid. No discount will be applied.',
                'icon' => 'warning'
            ]);
        } catch (\Exception $e) {
            \Log::error('Error marking HKI member as invalid: ' . $e->getMessage());

            $this->dispatchBrowserEvent('hki-validation-error', [
                'title' => 'Operation Failed',
                'message' => 'An error occurred while marking HKI membership as invalid. Please try again.',
                'icon' => 'error'
            ]);
        }
    }

    public function render()
    {
        return view('livewire.validate-member', [
            'participants' => Participant::where('hki_status', 'like', '%' . $this->search)->where('member_card', '!=', null)->where('full_name1', 'like', '%' . $this->search2 . '%')->orderBy('full_name1')->paginate(10)
        ]);
    }
}
