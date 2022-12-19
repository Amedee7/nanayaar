<?php

namespace App\Exports;

use Carbon\Carbon;
use App\Models\Client;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;

class ClientsExport implements FromQuery, WithStrictNullComparison, WithHeadings, WithMapping
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
            'N. Tel 1',
            'N. Tel 2',
            'Genre',
            'Mt. Demande',
            'Cs. A Verse',
            'Agent Com',
            'Status',
        ];
    }

    public function map($row):array
    {
        return[
            $row->name,
            $row->lastname,
            $row->first_phone,
            $row->second_phone,
            $row->genre,
            $row->montant_demande,
            $row->commission_averse,
            $row->user_,
            $row->status,
        ];
    }
}
