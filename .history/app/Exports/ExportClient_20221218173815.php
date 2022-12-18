<?php

namespace App\Exports;

use App\Models\Client;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportClient implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
        {
            return Client::select('name','montant_demande')->get();
        }
}
