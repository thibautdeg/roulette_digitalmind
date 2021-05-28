<?php

namespace App\Http\Livewire;

use App\Models\Data;
use App\Models\Game;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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
    public $userId;


    protected $rules = [
        'total'=>'required|integer|min:2',
        'bet'=>'required|integer|min:1',
        'color'=>'required|string',
        'plafond'=>'required|integer|min:1',
        'times'=>'integer|min:1',
        'minutes'=>'integer|min:1',
        'hourly'=>'integer|min:1',
    ];
    protected $messages = [

    ];

    public function mount(){
        $user = new User();
        $user->name = "guest";
        $user->save();
        $this->userId = $user->id;
    }

    public function submitForm(){
        $this->validate();

        $data = new Data();
        $data->total = $this->total;
        $data->bet = $this->bet;
        $data->user_id = $this->userId;
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
        $data->hourly = $this->hourly * ($this->minutes / 60);
        $data->black_procent = ($blackcount / $count) * 100;
        $data->red_procent = ($redcount / $count) *100;
        $data->update();
        $this->getGamedata();
        $this->bet = 0;
        $this->total = 0;
        $this->plafond = 0;
        $this->hourly = 0;
        $this->minutes = 0;
        $this->times = 0;
    }

    public function getGamedata(){
        $this->data = Data::with(['games'])->where('user_id',$this->userId)->get();
    }

    public function render()
    {
        return view('livewire.roulette');
    }
}
