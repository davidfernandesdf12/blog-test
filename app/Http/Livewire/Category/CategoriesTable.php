<?php

namespace App\Http\Livewire\Category;

use App\Models\Categories;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class CategoriesTable extends LivewireDatatable
{
    public $model = Categories::class;
    public $exportable = true;
    public $hideable = 'select';

    public function columns()
    {
        return [
            Column::name('id')
                ->sortBy('id')
                ->defaultSort('asc'),

            Column::name('title')
                ->label('Title')
                ->sortBy('title')
                ->searchable(),

            Column::name('slug')
                ->sortBy('slug')
                ->searchable(),

            DateColumn::name('created_at')
                ->label('Created')
                ->sortBy('created_at')
                ->format('d/m/Y H:i:s'),
            DateColumn::name('updated_at')
                ->label('Updated')
                ->sortBy('updated_at')
                ->format('d/m/Y H:i:s'),

            Column::callback(['id'], function ($id) {
                $routeEditName = 'admin.categories.edit';
                $routeShowName = null;
                return view('livewire.datatables.table-actions', [
                    'id' =>  $id,
                    'routeEditName' => $routeEditName,
                    'routeShowName' => $routeShowName
                ]);
            })->label('Edit')->sortBy('id'),

            Column::delete()
                ->alignRight()
                ->label('Delete')
                ->sortBy('id')
        ];
    }
}
