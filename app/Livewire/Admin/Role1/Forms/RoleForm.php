<?php

namespace App\Livewire\Admin\Role\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class RoleForm extends Form
{
    public string|null $name = null;
    public array $selectedPermissions = [];


  public function rules(string|null $id = null): array
  {
      return [
          'name' => 'required|string|max:255',
          'selectedPermissions' => 'array',
          'selectedPermissions.*' => 'exists:permissions,id',
      ];
  }

  public function attributes(): array
  {
      return [
          'name' => 'name',
          'selectedPermissions' => 'selectedPermissions',
      ];
  }
}
