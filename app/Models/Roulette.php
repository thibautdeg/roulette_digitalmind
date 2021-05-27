<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roulette extends Model
{
    use HasFactory;

    public $color = '';

    public function makeResults(){
        $rouletteNum = rand(0,36);
        if ($rouletteNum == 0){
            $this->color = 'Green';
        }
        elseif ($rouletteNum % 2 != 0 && $rouletteNum <10 && $rouletteNum >=19){
            $this->color = 'Red';
        }
        elseif ($rouletteNum % 2 != 0 && $rouletteNum >=10 && $rouletteNum <19){
            $this->color = 'Black';
        }
        else
            $this->color = 'Red';
        $data = [
            'color' => $this->color,
            'number' => $rouletteNum,
        ];
        return $data;

    }
}
