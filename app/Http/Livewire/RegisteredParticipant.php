<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Participant;
use Livewire\WithPagination;
use App\Exports\RegisteredExport;
use Maatwebsite\Excel\Facades\Excel;

class RegisteredParticipant extends Component
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
        $query = \App\Support\AdminRecords::participants($this->search2, $this->date_from, $this->date_to);

        return view('livewire.registered-participant', [
            'participants' => $query->paginate(10)
        ]);
    }

    public function export()
    {
        return Excel::download(new RegisteredExport($this->date_from, $this->date_to, '', $this->search2), 'All registered user.xlsx');
    }
}
