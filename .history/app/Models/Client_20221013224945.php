<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $guarded = ['id', 'uuid'];
    use HasFactory;

    public function user()
    {
        return $this->hasMany(Event::class);
    }
}
