<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public $guarded = [];
    use HasFactory;

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
