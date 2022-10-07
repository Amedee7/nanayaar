<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Versement extends Model
{
    use HasFactory;
    public $guarded = [];

    public function client()
    {
        return $this->belongsTo(Client::class, 'user_id', 'id');
    }
}
