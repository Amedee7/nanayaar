<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    $guarded = 
    use HasFactory;

    public function events()
    {
        return $this->hasMany(Event::class);
    }
}
