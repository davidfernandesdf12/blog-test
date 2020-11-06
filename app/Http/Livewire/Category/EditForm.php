<?php

namespace App\Http\Livewire\Category;

use Livewire\Component;

class EditForm extends Component
{
    public $category;

    public $title;

    protected $rules = [
        'title' => 'required|min:4',
    ];

    public function mount($category)
    {
        $this->title = $category->title;
    }

    public function submit()
    {
        $validatedData = $this->validate();

        $this->category->forceFill($validatedData)->save();

        flash('Category saved successfully!')->success()->livewire($this);

        return redirect()->back();
    }

    public function render()
    {
        return view('livewire.category.edit-form');
    }
}
