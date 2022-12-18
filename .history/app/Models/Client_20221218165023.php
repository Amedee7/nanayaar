<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

     // Fetch all clients
   public static function getUsers(){

    $records = DB::table('clients')->select('name','last','gender','email')->orderBy('id', 'asc')->get()->toArray();

    return $records;
  }
}
