<?php

namespace App\Exports\Concerns;

trait HasAdminFilters
{
    protected $dateFrom;
    protected $dateTo;
    protected $search;
    protected $search2;

    public function __construct($dateFrom = null, $dateTo = null, $search = '', $search2 = '')
    {
        $this->dateFrom = $dateFrom;
        $this->dateTo = $dateTo;
        $this->search = $search;
        $this->search2 = $search2;
    }
}
