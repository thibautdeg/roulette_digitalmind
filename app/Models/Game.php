<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    public $fillable = [
        'number',
        'color',
        'data_id',
        'bet',
        'subtotal',
        'type',
    ];

    public function data(){
        return $this->belongsTo(Data::class);
    }
}
