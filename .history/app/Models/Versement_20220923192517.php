<?php

namespace App\Models;

use App\Models\Client;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Versement extends Model
{
    use HasFactory;
    public $guarded = [];

    protected  static  function  boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->uuid = (string) Str::uuid();
        });
    }
    
    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id', 'id');
    }
}
