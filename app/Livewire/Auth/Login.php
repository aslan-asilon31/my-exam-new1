<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class Login extends Component
{
    public $email;
    public $password;
    public  $title = "Halaman Login";


    protected $rules = [
        'email' => 'required|email',
        'password' => 'required|min:5',
    ];



    public function mount()
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->hasRole('developer')|| $user->hasRole('admin')) {
                return redirect()->to('/dasbor');
            } else {
                return redirect()->to('/dasbor-user');
            }

        }
    }



    public function login()
    {
        $this->validate();

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            return redirect()->to('/dasbor');
        } else {
            throw ValidationException::withMessages([
                'email' => ['Email or password is incorrect.'],
            ]);
        }
    }

    public function render()
    {
        return view('livewire.auth.login')
        ->layout('components.layouts.app_auth');
    }
}

