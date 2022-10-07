<?php

namespace App\Models;

use App\Models\Client;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pret extends Model
{
    use HasFactory;
    protected  static  function  boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->uuid = (string) Str::uuid();
        });
    }
/

    public function clients()
    {
        return $this->hasMany(Client::class);
    }
}
