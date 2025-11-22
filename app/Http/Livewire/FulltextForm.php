<?php

namespace App\Http\Livewire;

use App\Models\Payment;
use Livewire\Component;
use App\Models\UploadAbstract;
use App\Models\UploadFulltext;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;

class FulltextForm extends Component
{
    public $title, $fulltext, $payment_id, $payment;
    public $add = false, $edit = false, $fulltext_edit_id;
    public $current_file = null;

    use WithFileUploads;
    public function mount()
    {
        $this->payment = Payment::where('participant_id', Auth::user()->participant->id)->where('validation', 'valid')->get();
        // dd($this->payment);
    }
    public function rules()
    {
        $rules = [
            'title' => 'required',
            'payment_id' => 'required',
        ];

        // Only require file on create, make it optional on edit
        if (!$this->edit) {
            $rules['fulltext'] = 'required|file|mimes:pdf,docx';
        } else {
            $rules['fulltext'] = 'nullable|file|mimes:pdf,docx';
        }

        return $rules;
    }

    //Custom Errror messages for validation
    protected $messages = [
        'title.required' => 'Title is required !',
        'payment_id.required' => 'Abstract is required !',
        'fulltext.required' => 'Fulltext is required !',
        'fulltext.file' => 'Fulltext must type a file !',
        'fulltext.mimes' => 'Fulltext must have .pdf or .docx format !',
    ];

    //Reatime Validation
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function add()
    {
        $this->add = true;
        $this->dispatchBrowserEvent('to-top');
        $this->resetErrorBag();
        $this->resetValidation();
    }


    public function empty()
    {
        $this->fulltext_edit_id = null;
        $this->title = null;
        $this->fulltext = null;
        $this->payment_id = null;
        $this->current_file = null;
        $this->add = false;
        $this->edit = false;
    }

    public function editFulltext($id)
    {
        $fulltext = UploadFulltext::find($id);
        $this->fulltext_edit_id = $id;
        $this->title = $fulltext->title;
        $this->payment_id = $fulltext->payment_id;
        $this->current_file = $fulltext->fulltext;
        $this->edit = true;
        $this->dispatchBrowserEvent('to-top');
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function update()
    {
        try {
            $this->validate();

            $updateData = [
                'title' => $this->title,
                'payment_id' => $this->payment_id,
            ];

            // Only update file if a new one is uploaded
            if ($this->fulltext) {
                $filePath = $this->fulltext->store('fulltext-papers', config('filesystems.storage'));
                $updateData['fulltext'] = $filePath;

                // Delete old file
                $oldFulltext = UploadFulltext::find($this->fulltext_edit_id);
                if ($oldFulltext && $oldFulltext->fulltext) {
                    \Storage::disk(config('filesystems.storage'))->delete($oldFulltext->fulltext);
                }
            }

            UploadFulltext::where('id', $this->fulltext_edit_id)->update($updateData);

            $this->empty();
            $this->cancel();

            $this->dispatchBrowserEvent('fulltext-success', [
                'title' => 'Full-text Updated!',
                'message' => 'Your full-text paper has been updated successfully.',
                'icon' => 'success'
            ]);
        } catch (\Exception $e) {
            \Log::error('Error updating full-text: ' . $e->getMessage());

            $this->dispatchBrowserEvent('fulltext-error', [
                'title' => 'Update Failed',
                'message' => 'An error occurred while updating your full-text paper. Please try again.',
                'icon' => 'error'
            ]);
        }
    }

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
            $this->validate();

            $filePath = $this->fulltext->store('fulltext-papers', config('filesystems.storage'));
            UploadFulltext::create([
                'title' => $this->title,
                'payment_id' => $this->payment_id,
                'fulltext' => $filePath,
                'validation' => 'not yet validated',
                'validated_by' => null
            ]);

            $this->cancel();
            $this->empty();
            
            $this->dispatchBrowserEvent('fulltext-success', [
                'title' => 'Full-text Uploaded!',
                'message' => 'Your full-text paper has been uploaded successfully and is waiting for validation.',
                'icon' => 'success'
            ]);
        } catch (\Exception $e) {
            \Log::error('Error uploading full-text: ' . $e->getMessage());

            $this->dispatchBrowserEvent('fulltext-error', [
                'title' => 'Upload Failed',
                'message' => 'An error occurred while uploading your full-text paper. Please try again.',
                'icon' => 'error'
            ]);
        }
    }

    public function render()
    {
        return view('livewire.fulltext-form', [
            'fulltexts' => UploadFulltext::whereRelation('payment', 'participant_id', Auth::user()->participant->id)->latest()->get()
        ]);
    }
}
