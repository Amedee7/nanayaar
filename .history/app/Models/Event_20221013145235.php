<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['client_id', 'start', 'rented', 'end', 'limit'];

    protected $appends = ['display'];

    public function getDisplayAttribute()
    {
        return 'background';
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
