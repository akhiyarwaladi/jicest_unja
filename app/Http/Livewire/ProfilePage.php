<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\Participant;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;

class ProfilePage extends Component
{
    public $full_name1, $full_name2, $gender, $institution, $address, $phone, $member_card, $hki_status, $email, $password, $confirmPassword;


    use WithFileUploads;

    public function mount()
    {

        $user = Auth::user();
        $this->email = $user->email;
        $this->full_name1 = $user->participant->full_name1;
        $this->full_name2 = $user->participant->full_name2;
        $this->gender = $user->participant->gender;
        $this->institution = $user->participant->institution;
        $this->address = $user->participant->address;
        $this->hki_status = $user->participant->hki_status;
        $this->phone = $user->participant->phone;
    }


    public function empty()
    {

        $user = Auth::user();
        $this->email = $user->email;
        $this->full_name1 = $user->participant->full_name1;
        $this->full_name2 = $user->participant->full_name2;
        $this->gender = $user->participant->gender;
        $this->institution = $user->participant->institution;
        $this->address = $user->participant->address;
        $this->phone = $user->participant->phone;

        $this->dispatchBrowserEvent('to-top');
    }
    public function rules()
    {
        return [
            'full_name1' => 'required',
            'full_name2' => 'required',
            'gender' => 'required|in:male,female',
            'institution' => 'required',
            'address' => 'required',
            'phone' => 'required|regex:/^([0-9\\\\s\\\\+]*)$/',
            'email' => 'required|unique:users,email,' . Auth::user()->id . '|email:rfc',
        ];
    }

    //Custom Errror messages for validation
    protected $messages = [
        'full_name1.required' => 'Full name without academic title is required !',
        'full_name2.required' => 'Full name with academic title is required !',
        'gender.required' => 'Gender is required !',
        'gender.in' => 'Gender can only contain male or female !',
        'attendance.required' => 'Attendance is required !',
        'attendance.in' => 'Attendance can only contain online or offline !',
        'phone.required' => 'Phone number is required !',
        'phone.regex' => 'The phone number must be a number and the + character is allowed !',
        'participant_type.required' => 'Participant type is required !',
        'participant_type.in' => 'Participan can only contain (Professional Presenter, Student Presenter and Participant) !',
        'institution.required' => 'Institution is required !',
        'address.required' => 'Address is required !',
        'email.required' => 'Email is required !',
        'email.unique' => 'Email has been registered',
        'email.email' => 'The field must have email format ',
        'password.required' => 'Password is required !',
        'password.min' => 'Password must consist of at least 8 characters',
        'confirmPassword.required' => 'Confirmation password is required!',
        'confirmPassword.same' => 'Incorrect password confirmation !',
    ];

    //Reatime Validation
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function update()
    {
        try {
            \Log::info('Profile update started for user: ' . Auth::user()->id);
            
            $this->validate();
            \Log::info('Validation passed');
            
            if ($this->email !== Auth::user()->email) {
                \Log::info('Updating email from ' . Auth::user()->email . ' to ' . $this->email);
                User::where('id', Auth::user()->id)->update([
                    'email' => $this->email,
                    'email_verified_at' => null
                ]);
            }

            \Log::info('Updating participant data for user_id: ' . Auth::user()->id);
            
            // Only update fields that are actually in the form (participant_type and attendance are commented out)
            $participantData = [
                'full_name1' => $this->full_name1,
                'full_name2' => $this->full_name2,
                'gender' => $this->gender,
                'institution' => $this->institution,
                'address' => $this->address,
                'phone' => $this->phone,
            ];
            
            \Log::info('Participant data to update: ', $participantData);
            
            $result = Participant::where('user_id', Auth::user()->id)->update($participantData);
            \Log::info('Participant update result (rows affected): ' . $result);

            $this->empty();
            \Log::info('Profile update completed successfully');
            
            $this->dispatchBrowserEvent('profile-success', [
                'title' => 'Profile Updated!',
                'message' => 'Your profile has been updated successfully.',
                'icon' => 'success'
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            \Log::error('Validation error in profile update: ', $e->errors());
            
            $this->dispatchBrowserEvent('profile-error', [
                'title' => 'Validation Error',
                'message' => 'Please check your input and try again. ' . collect($e->errors())->flatten()->first(),
                'icon' => 'error'
            ]);
        } catch (\Exception $e) {
            \Log::error('Error updating profile: ' . $e->getMessage());
            \Log::error('Error trace: ' . $e->getTraceAsString());

            $this->dispatchBrowserEvent('profile-error', [
                'title' => 'Update Failed',
                'message' => 'An error occurred while updating your profile. Please try again. Error: ' . $e->getMessage(),
                'icon' => 'error'
            ]);
        }
    }
    public function render()
    {
        return view('livewire.profile-page');
    }
}
