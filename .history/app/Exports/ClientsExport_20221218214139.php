<?php

namespace App\Exports;

use App\Models\Client;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;

class ClientsExport implements FromCollection, WithStrictNullComparison, WithHeadings
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

    public  function headings(): array
    {
        return [
            'Nom',
            'Prenom',
            'N Tel 1',
            'N Tel 2',
            'Genre',
            'Mt Demande',
            'Cs A Verse',
            'Prenom',
        ]
    }
}
