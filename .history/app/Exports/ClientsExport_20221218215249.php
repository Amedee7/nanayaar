<?php

namespace App\Exports;

use App\Models\Client;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;

class ClientsExport implements FromQuery, WithStrictNullComparison, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function query()
   
    {
        // return Client::all(
        //     [
        //         'name','lastname','first_phone','second_phone','genre','montant_demande','commission_averse','status'
        //     ]
        // );

        return Client::query();
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
            'Status',
        ];
    }

    public function map(Type $var = null):array
    {
        return[
            $row->name,
            $row->lastname,
            $row->first_phone,
            $row->lastname,
            $row->second_phone,
            $row->genre,
            $row->montant_demande,
            $row->second_phone,
            $row->genre,
        ]
    }
}
