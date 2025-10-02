<?php

namespace App\Http\Livewire;

use App\Exports\PaidParticipantExport;
use Livewire\Component;
use App\Models\Participant;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class ParticipantPaid extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search2 = '';
    public $date_from = '2025-09-01';
    public $date_to = '';

    public function mount()
    {
        $this->date_to = date('Y-m-d');
    }

    public function render()
    {
        $query = Participant::where('participant_type', 'participant')->where('full_name1', 'like', '%' . $this->search2 . '%')->whereHas('payments', function ($query) {
            $query->where('validation', 'valid');
        });

        if ($this->date_from) {
            $query->whereDate('created_at', '>=', $this->date_from);
        }

        if ($this->date_to) {
            $query->whereDate('created_at', '<=', $this->date_to);
        }

        return view('livewire.participant-paid', [
            'participants' => $query->orderBy('full_name1')->paginate(10)
        ]);
    }

    public function export()
    {
        return Excel::download(new PaidParticipantExport(), 'Participant have paid JICEST 2023.xlsx');
    }
}
