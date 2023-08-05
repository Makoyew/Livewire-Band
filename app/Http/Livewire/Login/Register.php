<?php

namespace App\Http\Livewire\Login;

use Livewire\Component;
use App\Models\User;
use Carbon\Carbon;

use Livewire\WithFileUploads;

class Register extends Component
{
    use WithFileUploads;

    public $username, $image, $name, $location, $email, $description, $password, $password_confirmation;

    public function register()
    {
        $this->validate([
            // 'image' => 'required',
            'name' => 'required|string',
            'username' => 'required|string',
            // 'location' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|string|min:8',
        ]);

        $user = new User();
        $user->name = $this->name;
        $user->username = $this->username;
        $user->email = $this->email;
        $user->password = bcrypt($this->password);
        $user->save();

        return redirect('/login')->with('message', 'Your account has been created successfully!');

        $this->user = $user;
    }

    public function render()
    {

        $users = User::all();


        return view('livewire.login.register', compact('users'));
    }
}

