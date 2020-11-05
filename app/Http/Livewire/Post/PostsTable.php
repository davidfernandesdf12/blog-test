<?php

namespace App\Http\Livewire\Post;

use App\Models\Posts;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class PostsTable extends LivewireDatatable
{
    public $model = Posts::class;
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
                ->label('Slug')
                ->sortBy('slug')
                ->searchable(),

            BooleanColumn::name('enabled')
                ->label('Enabled')
                ->sortBy('enabled'),

            DateColumn::name('created_at')
                ->label('Created')
                ->sortBy('created_at')
                ->format('d/m/Y H:i:s'),
            DateColumn::name('updated_at')
                ->label('Updated')
                ->sortBy('updated_at')
                ->format('d/m/Y H:i:s'),

            Column::callback(['id'], function ($id) {
                $routeEditName = 'admin.posts.edit';
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
