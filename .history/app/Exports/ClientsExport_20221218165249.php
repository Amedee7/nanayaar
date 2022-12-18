<?php

namespace App\Exports;

use App\Models\AppClient;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ClientsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array {
        return [
           "username","name","gender","email"
        ];
      }
    
      /**
      * @return \Illuminate\Support\Collection
      */
      public function collection() {
    
         return collect(Page::getUsers());
         // return Page::getUsers(); // Use this if you return data from Model without using toArray().
      }
    }