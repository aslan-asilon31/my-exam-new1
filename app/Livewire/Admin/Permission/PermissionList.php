<?php

namespace App\Livewire\Admin\Permission;

use Livewire\Component;
use Livewire\Attributes\Title;

class PermissionList extends Component
{
    public $title = "Permission";
    public $url = "permission";
    use \App\Helpers\Table\Traits\WithTable;


    public function render()
    {
        return view('livewire.admin.permission.permission-list')
        ->title($this->title);
    }
}
