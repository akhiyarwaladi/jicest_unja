<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class ChangePassword extends Component
{
    public $password, $current_password, $password_confirmation;

    public function rules()
    {
        return
            [
                'current_password' => ['required', 'current_password'],
                'password' => ['required', 'min:8', Password::defaults(), 'confirmed'],
            ];
    }

    //Reatime Validation
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        try {
            $this->validate();
            
            // Verify current password
            if (!Hash::check($this->current_password, Auth::user()->password)) {
                $this->dispatchBrowserEvent('password-error', [
                    'title' => 'Invalid Password',
                    'message' => 'Current password is incorrect. Please try again.',
                    'icon' => 'error'
                ]);
                return;
            }
            
            User::where('id', Auth::user()->id)->update([
                'password' => Hash::make($this->password),
            ]);

            $this->password = null;
            $this->password_confirmation = null;
            $this->current_password = null;
            
            $this->dispatchBrowserEvent('password-success', [
                'title' => 'Password Updated!',
                'message' => 'Your password has been changed successfully.',
                'icon' => 'success'
            ]);
        } catch (\Exception $e) {
            \Log::error('Error updating password: ' . $e->getMessage());

            $this->dispatchBrowserEvent('password-error', [
                'title' => 'Update Failed',
                'message' => 'An error occurred while updating your password. Please try again.',
                'icon' => 'error'
            ]);
        }
    }
    public function render()
    {
        return view('livewire.change-password');
    }
}
