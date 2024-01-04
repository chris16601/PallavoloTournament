<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{
    public $email;
    public $password;


    public function login()
    {
        $credentials = [
            'email' => $this->email,
            'password' => $this->password,
        ];

        if (Auth::attempt($credentials)) {
            // Login successo
            return redirect()->to('/'); // Redirect alla dashboard dopo il login
        } else {
            // Login fallito
            session()->flash('error', 'Credenziali non valide. Riprova.');
            return redirect()->back();
        }
    }

    public function render()
    {
        return view('livewire.login');
    }
}
