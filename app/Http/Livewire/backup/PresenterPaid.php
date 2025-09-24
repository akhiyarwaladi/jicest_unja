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

    public function render()
    {
        return view('livewire.presenter-paid', [
            'participants' => Participant::where('participant_type', '<>', 'participant')->where('full_name1', 'like', '%' . $this->search2 . '%')->whereHas('payments', function ($query) {
                $query->where('validation', 'valid');
            })->orderBy('full_name1')->paginate(10)
        ]);
    }

    public function export()
    {
        return Excel::download(new PaidPresenterExport(), 'Presenter have paid JICEST 2023.xlsx');
    }
}
