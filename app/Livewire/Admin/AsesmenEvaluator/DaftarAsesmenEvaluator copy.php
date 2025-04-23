<?php

namespace App\Livewire\Admin\AsesmenEvaluator;

use Livewire\Component;
use Livewire\Attributes\Title;

class DaftarAsesmenEvaluator extends Component
{
    public string $url = '/asesmen-evaluator';
    public $title = 'Asesmen Evaluator';



    public function render()
    {
        return view('livewire.admin.asesmen-evaluator.daftar-asesmen-evaluator')
        ->title($this->title);
    }

}
