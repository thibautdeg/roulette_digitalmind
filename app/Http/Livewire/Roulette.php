<?php

namespace App\Http\Livewire;

use App\Models\Data;
use App\Models\Game;
use Livewire\Component;


class Roulette extends Component
{
    public $total;
    public $bet;
    public $data;
    public $procent;
    public $redper;
    public $blackper;
    public $color;
    public $plafond;
    public $times;
    public $minutes;
    public $hourly;


    protected $rules = [
        'total'=>'required|integer|min:2',
        'bet'=>'required|integer|min:1',
        'color'=>'required|string',
        'plafond'=>'required|integer|min:1',
        'times'=>'integer|min:1',
    ];
    protected $messages = [

    ];

    public function submitForm(){
        $this->validate();

        $data = new Data();
        $data->total = $this->total;
        $data->bet = $this->bet;
        $data->save();

        $redcount = 0;
        $blackcount = 0;
        $greencount = 0;
        $count = 0;

        while ( $this->total > 0){
            $rouletteNum = rand(0,36);
            $color = '';
            $type = '';
            if($this->times <= $count){
                break;
            }
            if($this->bet >= $this->plafond){
                break;
            }
            if($rouletteNum == 0) {
                $color = 'Green';
                $greencount += 1;
            }
            elseif ($rouletteNum <=10 || $rouletteNum >=19 && $rouletteNum <=28){
                if ($rouletteNum % 2 != 0){
                    $color = 'Red';
                    $redcount += 1;
                }
                else{
                    $color = 'Black';
                    $blackcount += 1;
                }
            }
            elseif ($rouletteNum >=11 && $rouletteNum <=18 || $rouletteNum >=29){
                if ($rouletteNum % 2 != 0){
                    $color = 'Black';
                    $blackcount += 1;
                }
                else{
                    $color = 'Red';
                    $redcount += 1;
                }

            }
            if ($color == $this->color){
                $this->total = $this->total + $this->bet;
                $type = 'win';
            }
            else{
                $this->total = $this->total - $this->bet;
                $type = 'loss';
            }
            $count += 1;

            $game = new Game();
            $game->data_id = $data->id;
            $game->color = $color;
            $game->number = $rouletteNum;
            $game->bet = $this->bet;
            $game->subtotal = $this->total;
            $game->type = $type;
            $game->save();
            $this->bet = $this->bet * 2;

        }
        $this->minutes = $count * $this->minutes;
        $this->hourly = $this->hourly * ($this->minutes / 60);
        $this->blackper = ($blackcount / $count) * 100;
        $this->redper = ($redcount / $count) *100;
        $this->getGamedata($data->id);
        $this->bet = 0;
        $this->total = 0;
    }

    public function getGamedata($id){
        $this->data = Data::with(['games'])->latest()->first();
    }

    public function render()
    {
        return view('livewire.roulette');
    }
}
