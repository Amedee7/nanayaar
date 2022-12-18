<?php

namespace App\Exports;

use App\Models\AppClient;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ClientsExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array {
        return [
            'name','lastname','fisrt_phone','montant_demande'
        ];
      }
    
      /**
      * @return \Illuminate\Support\Collection
      */
      public function collection() {
    
         return collect(C::getClients());
         // return Page::getUsers(); // Use this if you return data from Model without using toArray().
      }
    }