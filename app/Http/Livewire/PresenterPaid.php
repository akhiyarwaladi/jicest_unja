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
    use \App\Http\Livewire\Concerns\ResetsAdminFilters;
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
        $query = \App\Support\AdminRecords::participants($this->search2, $this->date_from, $this->date_to, 'presenter');

        return view('livewire.presenter-paid', [
            'participants' => $query->paginate(10)
        ]);
    }

    public function export()
    {
        return Excel::download(new PaidPresenterExport($this->date_from, $this->date_to, '', $this->search2), 'Presenter have paid JICEST 2026.xlsx');
    }
}
