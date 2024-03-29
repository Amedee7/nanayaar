<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Client;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Versement extends Model
{
    use HasFactory;
    public $guarded = ['id'];

    protected  static  function  boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->uuid = (string) Str::uuid();
        });
    }


    public function client()
    {
        return $this->belongsTo(Client::class);
    }


    public function calculatePenalty()
    {
        $now = Carbon::now();
        $deadline = Carbon::parse($this->limit);
        $daysOverdue = $now->diffInDays($deadline);
        $penaltyRate = config('app.penalty_rate');

        if ($daysOverdue > 0) {
            $this->penalite = $daysOverdue * $penaltyRate * $this->reste_apaye;
        } else {
            $this->penalite = 0;
        }
    }
}
