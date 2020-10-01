<?php

namespace App\Exports;

use App\Models\Billing;
use Maatwebsite\Excel\Concerns\FromCollection;

class BillingExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Billing::all();
    }
}
