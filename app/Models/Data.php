<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    use HasFactory;

    public $fillable = [
        'total',
        'amount',
        'bet',
        'user_id',
        'hourly',
        'black_procent',
        'red_procent',

    ];

    public function games(){
        return $this->hasMany(Game::class);
    }
}
