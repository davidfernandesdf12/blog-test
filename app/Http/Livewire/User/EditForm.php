<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use Livewire\WithFileUploads;

class EditForm extends Component
{
    use WithFileUploads;

    public $user;

    public $name;
    public $email;
    public $password;
    public $confirm_password;
    public $photo;

    protected $rules = [
        'name' => 'required|min:4',
        'email' => 'required|email',
    ];

    public function mount($user)
    {
        $this->name = $user->name;
        $this->email = $user->email;
    }

    public function submit()
    {
        $validatedData = $this->validate();

        if (isset($this->photo)){
            $this->user->updateProfilePhoto($this->photo);
        }

        $this->user->forceFill($validatedData)->save();

        flash('User saved successfully!')->success()->livewire($this);

        return redirect()->back();
    }

    public function render()
    {
        return view('livewire.user.edit-form');
    }
}
