<?php

namespace App\Http\Livewire\Category;

use App\Models\Categories;
use Livewire\Component;

class CreateForm extends Component
{
    public $title;

    protected $rules = [
        'title' => 'required|min:4',
    ];

    public function submit(){
        $validatedData = $this->validate();

        Categories::create($validatedData);

        $this->clearForm();

        flash('Category created successfully!')->success()->livewire($this);

        return redirect()->back();
    }

    private function clearForm(){
        $this->title = null;
    }

    public function render()
    {
        return view('livewire.category.create-form');
    }
}
