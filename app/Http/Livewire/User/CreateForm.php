<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateForm extends Component
{
    use WithFileUploads;

    /**
     * The component's state.
     *
     * @var array
     */
    public $state = ['name', 'email', 'password', 'confirm_password'];

    public $name;
    public $email;
    public $password;
    public $confirm_password;
    public $photo;

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

        User::create($validatedData);

        flash('Your request was successful!')->success()->livewire($this);
    }

    public function render()
    {
        return view('livewire.user.create-form');
    }
}
