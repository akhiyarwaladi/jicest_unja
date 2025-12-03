<?php

namespace App\Http\Livewire;

use App\Mail\SendMail;
use Livewire\Component;
use App\Models\Participant;
use App\Models\UploadFulltext;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Exports\UploadedPaperExport;
use Maatwebsite\Excel\Facades\Excel;

class UploadedPaper extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $title, $fulltext, $uploadedPaper;
    public $search = '', $search2 = '';
    public $date_from = '2025-09-01';
    public $date_to = '';

    public function mount()
    {
        $this->date_to = date('Y-m-d');
    }

    public function empty()
    {
        $this->title = null;
        $this->fulltext = null;
        $this->uploadedPaper = null;
    }
    public function showValidate($id)
    {
        $this->uploadedPaper = $id;
        $paper = UploadFulltext::find($id);
        $this->title = $paper->title;
        $this->fulltext = $paper->fulltext;
        $this->dispatchBrowserEvent('show-modal');
    }

    public function valid()
    {
        try {
            $email = UploadFulltext::find($this->uploadedPaper)->payment->participant->user->email;
            
            UploadFulltext::where('id', $this->uploadedPaper)->update([
                'validation' => 'valid',
                'validated_by' => Auth::user()->email
            ]);
            
            Mail::to($email)->send(new SendMail('Validation Fulltext', 'Your fulltext status has been validated', []));
            
            $this->empty();
            $this->dispatchBrowserEvent('close-modal');
            
            $this->dispatchBrowserEvent('fulltext-validation-success', [
                'title' => 'Full-text Validated!',
                'message' => 'Full-text paper has been validated successfully and notification email sent to the author.',
                'icon' => 'success'
            ]);
        } catch (\Exception $e) {
            \Log::error('Error validating full-text: ' . $e->getMessage());

            $this->dispatchBrowserEvent('fulltext-validation-error', [
                'title' => 'Validation Failed',
                'message' => 'An error occurred while validating the full-text paper. Please try again.',
                'icon' => 'error'
            ]);
        }
    }

    public function invalid()
    {
        try {
            $email = UploadFulltext::find($this->uploadedPaper)->payment->participant->user->email;
            
            UploadFulltext::where('id', $this->uploadedPaper)->update([
                'validation' => 'invalid',
                'validated_by' => Auth::user()->email
            ]);
            
            Mail::to($email)->send(new SendMail('Validation Fulltext', 'Your fulltext status has been validated, your uploaded fulltext is invalid', []));
            
            $this->empty();
            $this->dispatchBrowserEvent('close-modal');
            
            $this->dispatchBrowserEvent('fulltext-validation-success', [
                'title' => 'Full-text Marked Invalid!',
                'message' => 'Full-text paper has been marked as invalid and notification email sent to the author.',
                'icon' => 'warning'
            ]);
        } catch (\Exception $e) {
            \Log::error('Error marking full-text as invalid: ' . $e->getMessage());

            $this->dispatchBrowserEvent('fulltext-validation-error', [
                'title' => 'Operation Failed',
                'message' => 'An error occurred while marking the full-text paper as invalid. Please try again.',
                'icon' => 'error'
            ]);
        }
    }

    public function exportExcel()
    {
        $filename = 'uploaded-paper-list-' . date('Y-m-d-His') . '.xlsx';
        return Excel::download(
            new UploadedPaperExport($this->date_from, $this->date_to, $this->search, $this->search2),
            $filename
        );
    }

    public function render()
    {
        $query = UploadFulltext::where('validation', 'like', '%' . $this->search)
            ->where('title', 'like', '%' . $this->search2 . '%');

        if ($this->date_from) {
            $query->whereDate('created_at', '>=', $this->date_from);
        }

        if ($this->date_to) {
            $query->whereDate('created_at', '<=', $this->date_to);
        }

        return view('livewire.uploaded-paper', [
            'fulltexts' => $query->orderBy('created_at', 'desc')->paginate(10)
        ]);
    }
}
