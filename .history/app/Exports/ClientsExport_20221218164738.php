<?php

namespace App\Exports;

use App\Models\AppClient;
use Maatwebsite\Excel\Concerns\FromCollection;

class ClientsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return AppClient::all();
    }
}
