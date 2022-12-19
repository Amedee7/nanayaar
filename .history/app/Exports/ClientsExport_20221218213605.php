<?php

namespace App\Exports;

use App\Models\Client;
use Maatwebsite\Excel\Concerns\FromCollection;

class ClientsExport implements FromCollection, WithS
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Client::all(
            [
                'name','lastname','first_phone','second_phone','genre','montant_demande','commission_averse','status'
            ]
        );
    }
}
