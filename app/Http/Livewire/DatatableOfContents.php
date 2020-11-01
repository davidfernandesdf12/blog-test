<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Str;
use Livewire\Component;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class DatatableOfContents extends LivewireDatatable
{
//    public $model = User::class;

    public function columns()
    {
        return [
            Column::name('id')->sortBy('id')->defaultSort('asc'),

            Column::callback('name', function ($value) {
                return view('datatables::link', [
                    'href' => "/" . Str::slug($value),
                    'slot' => ucfirst($value)
                ]);
            })
                ->label('name')
                ->sortBy('name'),

            Column::name('email')->sortBy('email'),
//            Column::name('email_verified_at')->->sortBy('email_verified_at'),
//            Column::name('email')
        ];
    }
}
