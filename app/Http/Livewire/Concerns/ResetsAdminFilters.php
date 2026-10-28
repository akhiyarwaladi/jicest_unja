<?php

namespace App\Http\Livewire\Concerns;

trait ResetsAdminFilters
{
    public function updating($property, $value): void
    {
        if (in_array($property, ['search', 'search2', 'date_from', 'date_to'], true)) {
            $this->resetPage();
        }
    }

    public function allDates(): void
    {
        $this->date_from = '';
        $this->date_to = '';
        $this->resetPage();
    }
}
