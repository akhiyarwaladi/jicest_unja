<?php

namespace App\Http\Livewire;

use App\Exports\PaidPresenterExport;
use Livewire\Component;
use App\Models\Participant;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class PresenterPaid extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search2 = '';
    public $date_from;
    public $date_to = '';

    public function mount()
    {
        $this->date_from = \App\Models\Fee::getDefaultFilterStart();
        $this->date_to = \App\Models\Fee::getDefaultFilterEnd();
    }

    public function render()
    {
        $query = Participant::where('participant_type', '<>', 'participant')->where('full_name1', 'like', '%' . $this->search2 . '%')->whereHas('payments', function ($query) {
            $query->where('validation', 'valid');
        });

        if ($this->date_from) {
            $query->whereDate('created_at', '>=', $this->date_from);
        }

        if ($this->date_to) {
            $query->whereDate('created_at', '<=', $this->date_to);
        }

        return view('livewire.presenter-paid', [
            'participants' => $query->orderBy('full_name1')->paginate(10)
        ]);
    }

    public function export()
    {
        return Excel::download(new PaidPresenterExport(), 'Presenter have paid JICEST 2026.xlsx');
    }
}
