<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Models\User;


class Login extends Component
{
    public $user = [];
    public $userId;
    public $userName;
    public $userEmail;

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

            $this->userId = auth()->id() ?? 'eafe4ec3-2e7d-4147-9dbe-754a79ff7740';
            $this->user = User::where('id', $this->userId)->firstOrFail()->toArray();
            $this->userName = $this->user['name'];
            $this->userEmail = $this->user['email'];

            session()->put('soal-sesi',[
                'user_id' => $this->userId,
                'user_name' => $this->userName,
                'user_email' => $this->userEmail,
            ]);

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

