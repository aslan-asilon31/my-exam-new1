<?php

namespace App\Livewire\Admin\Dasbor;

use Livewire\Component;
use Mary\Traits\Toast;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use App\Models\PenggunaAsesmen;
use App\Livewire\Admin\Dasbor\Forms\UserForm;
use App\Models\User;
use App\Models\Asesmen;
use App\Models\Role;
use App\Models\Permission;
use App\Models\ModelHasRoles;
use App\Models\RoleHasPermission;
use Illuminate\Support\Facades\Request;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Illuminate\Support\Str;
use Spatie\Permission\PermissionRegistrar;

class Dasbor extends Component
{
    use Toast;
    public $user_role ;
    public $url = '/dasbor';
    public $title = 'Dashboard';
    public $totalPesertaAsesmen;
    public $totalSoalAsesmen;
    public $modalUser = false;

    public $loading = false;

    public $image = null;

    use \Livewire\WithFileUploads;
    use \Mary\Traits\Toast;
    use \App\Helpers\ImageUpload\Traits\WithImageUpload;


    public UserForm $masterForm;

    public function mount()
    {
        $user = Auth::user();
        $this->user_role = $user->getRoleNames()->first();

        // $this->masterForm = new UserForm();

        $this->initialize();

    }

    public function initialize()
    {
        $this->totalPesertaAsesmen = PenggunaAsesmen::distinct('pengguna_id')->count('pengguna_id');
        $this->totalSoalAsesmen = Asesmen::count('id');

        $this->resetMasterForm();

    }

    public function openModal()
    {
        $this->modalUser = true;
        $this->resetMasterForm();
    }

    public function closeModal()
    {
        $this->modalUser = false;
    }

    public function resetMasterForm()
    {
        if (method_exists($this->masterForm, 'reset')) {
            $this->masterForm->reset();
            return;
        }

        $this->masterForm->name = null;
        $this->masterForm->email = null;
        $this->masterForm->img_url = null;
        $this->image = null;
    }

    
    public function render()
    {
        return view('livewire.admin.dasbor.dasbor')
        ->title($this->title);

    }

    public function simpan()
    {
        $validatedUserForm = $this->validate(
            $this->masterForm->rules(),
            [],
            $this->masterForm->attributes()
        )['masterForm'];
        

        if($this->image){
            $ext = $this->image->getClientOriginalExtension();
            $filename = str()->orderedUuid()->toString(). ".$ext";
    
            $filePath = $this->image->storeAs(
              path: 'files/images/users',
              name: $filename, 
              options: 'public'
            );
  
            $validatedUserForm['img_url'] =  '/' . $filePath;
          }

        $validatedUserForm['password'] = bcrypt('abcdefgh');
        $validatedUserForm['created_at'] = now();
        $validatedUserForm['updated_at'] = now();



        $roles_id = 1;
        $user = User::create($validatedUserForm);

        $userId = $user->id;
        ModelHasRoles::create([
            'role_id' => $roles_id,
            'model_type' => 'App\Models\User',
            'model_id' => $userId,
        ]);


        // Tutup modal, reset form
        $this->modalUser = false;
        $this->dispatch('user-dibuat');

        // Feedback sukses
        $this->success('Pengguna berhasil ditambahkan');
    }


    public function logout()
    {
        Auth::logout();
        return redirect()->to('/login');
    }
}

