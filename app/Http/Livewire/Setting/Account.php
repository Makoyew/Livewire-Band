<?php

namespace App\Http\Livewire\Setting;

use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use App\Models\User;
use Carbon\Carbon;
use Livewire\WithFileUploads;

class Account extends Component
{

    use WithFileUploads;
    public $password, $username, $current_password, $newpassword, $password_confirmation;

    public function mount(){
        $user = auth()->user();
        $this->username = $user->username;
    }

    public function render()
    {
        return view('livewire.setting.account');
    }

    public function account(){
        return view('components.account');
    }

    public function deleteUser()
    {
        $user = auth()->user();

        $user->delete();

        session()->flash('message', 'User deleted successfully.');

        return redirect('/');
    }


    public function editUsername(){

        $user = auth()->user();

        $this->validate([
            'username' => 'required',
        ]);

        $user->username = $this->username;

        $user->save();

        session()->flash('message', 'Username updated successfully.');

        return redirect('/account');
    }

    public function editAccount(){



        $this->validate([
            'current_password' => [
                'nullable',
                'required_with:password',
                function ($attribute, $value, $fail) {
                    if (!Hash::check($value, auth()->user()->password)) {
                        $fail(__('The current password is incorrect.'));
                    }
                },
            ],
            'password' => 'required|confirmed|string|min:8',
        ]);

        auth()->user()->update([
            'password' => Hash::make($this->password),
        ]);

        $user = auth()->user();

        $user->password = bcrypt($this->password);

        $user->save();


        session()->flash('message', 'Account updated successfully.');

        return redirect('/account');

    }
}

