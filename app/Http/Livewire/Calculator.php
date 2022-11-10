<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Calculator extends Component
{
    public $math = '';
    public $result = 0;

    public function render()
    {
        return view('livewire.calculator');
    }

    public function addMath($number)
    {
        $this->math .= $this->handleMath($number);
    }

    public function operation($operation)
    {
        if($operation == '='){
            $tmp = str_replace('%', '/100', $this->math);

            $this->result = eval('return ' . $tmp . ';');
        } else {
            $this->math .= $operation;
        }
    }

    public function clearMath()
    {
        $this->result = 0;
        $this->math = '';
    }

    public function handleMath($math)
    {
        if($math == 'parl'){
            return '(';
        }elseif($math == 'parr'){
            return ')';
        }elseif($math == 'div'){
            return '/';
        }else{
            return $math;
        }
    }
}
