<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    // protected $guarded = ['id', 'uuid'];
    protected $guarded = ['id'];
    
    use HasFactory, SoftDeletes;
    
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->uuid = (string) Str::uuid();
        });
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function versements()
    {
        return $this->hasMany(Versement::class, 'versement_id', 'id');
    }
}
