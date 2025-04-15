<?php

namespace App\Livewire\Admin\Dasbor\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class UserForm extends Form
{

    public string|null $id = null;
    public string|null $name = null;
    public string|null $email = null;
    public string|null $img_url = null;


    public function rules(): array
    {
        return [
            'masterForm.id' => 'nullable|string',
            'masterForm.name' => 'nullable|string',
            'masterForm.email' => 'nullable|string|email|unique:users,email',
            'masterForm.img_url' => 'nullable',
        ];
    }

    public function attributes(): array
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'img_url' => 'Image',
            'email' => 'Email',
        ];
    }

}
