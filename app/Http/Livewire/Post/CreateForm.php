<?php

namespace App\Http\Livewire\Post;

use App\Models\Posts;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateForm extends Component
{
    use WithFileUploads;

    public $title;
    public $enabled;
    public $categories;
    public $tags;

    public function render()
    {

        return view('livewire.post.create-form');
    }
}
