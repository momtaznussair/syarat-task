<?php

namespace App\Livewire\Auth;

use App\View\Components\Layouts\Guest;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{
    public $email;
    public $password;
    public function render()
    {
        return view('livewire.auth.login')
        ->layout(Guest::class);
    }
    
    protected $rules = [
        'email' => 'required|email',
        'password' => 'required',
    ];

    public function login()
    {
        $this->validate();

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            // Authentication successful
            return redirect()->to('/');
        } else {
            // Authentication failed
            session()->flash('error', 'Invalid credentials. Please try again.');
        }
    }
    
}
