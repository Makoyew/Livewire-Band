<?php

namespace App\Http\Livewire\Setting;

use Livewire\Component;
use App\Models\User;
use Carbon\Carbon;
use Livewire\WithFileUploads;

class Profile extends Component
{


    use WithFileUploads;

    public $image, $name, $location, $description, $user_edit_id;

    public function mount()
    {
        $user = auth()->user();
        $this->name = $user->name;
        $this->location = $user->location;
        $this->description = $user->description;

    }
    public function render()
    {


        // $user = auth()->user();
        // $this->name = $user->name;
        return view('livewire.setting.profile');
    }

    public function profile(){
        return view('components.profile');
    }


    public function deleteUser()
    {
        $user = auth()->user();

        $user->delete();

        session()->flash('message', 'User deleted successfully.');

        return redirect('/');
    }


    public function editProfile()
    {
        $user = auth()->user();

        $this->validate([
            'name' => 'required',
            // 'location' => 'required',
            // 'description' => 'required',
            'image' => 'nullable|image|max:1024',
        ]);

        $user->name = $this->name;
        $user->location = $this->location;
        $user->description = $this->description;

        if ($this->image) {
            $imageName = Carbon::now()->timestamp . '.' . $this->image->extension();
            $this->image->storeAs('image_uploads', $imageName);
            $user->image = $imageName;
        }

        $user->save();

        session()->flash('message', 'Profile updated successfully.');

        return redirect('/profile');
    }



}
