<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateForm extends Component
{
    use WithFileUploads;

    public $name;
    public $email;
    public $password;
    public $confirm_password;

    protected $rules = [
        'name' => 'required|min:4',
        'email' => 'required|email',
        'password' => 'min:6|required_with:confirm_password|same:confirm_password',
        'confirm_password' => 'min:6'
    ];

    public function submit()
    {
        $validatedData = $this->validate();

        $validatedData['password'] = bcrypt($validatedData['password']);

        $user = User::create($validatedData);

        $this->clearForm();

        flash('User created successfully!')->success()->livewire($this);

        return redirect()->back();
    }

    private function clearForm(){
        $this->name = null;
        $this->photo = null;
        $this->email = null;
        $this->password = null;
        $this->confirm_password = null;
    }

    public function render()
    {
        return view('livewire.user.create-form');
    }
}
