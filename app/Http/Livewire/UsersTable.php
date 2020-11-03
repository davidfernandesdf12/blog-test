<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Str;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class UsersTable extends LivewireDatatable
{
    public $model = User::class;
    public $exportable = true;
    public $hideable = 'select';

    public function columns()
    {
        return [

            Column::name('id')
                ->sortBy('id')
                ->defaultSort('asc'),

            Column::name('name')
                ->label('Name')
                ->sortBy('name')
                ->searchable(),

            Column::name('email')
                ->sortBy('email')
                ->searchable(),

            BooleanColumn::name('email_verified_at')
                ->label('Email Verified')
                ->sortBy('email_verified_at'),
            DateColumn::name('created_at')
                ->label('Created')
                ->sortBy('created_at')
                ->format('d/m/Y H:i:s'),
            DateColumn::name('updated_at')
                ->label('Updated')
                ->sortBy('updated_at')
                ->format('d/m/Y H:i:s'),


            Column::callback(['id'], function ($id) {
                $routeEditName = 'admin.users.edit';
                $routeShowName = 'admin.users.show';
                return view('livewire.datatables.table-actions', [
                    'id' =>  $id,
                    'routeEditName' => $routeEditName,
                    'routeShowName' => $routeShowName
                ]);
            })->label('View / Edit')->sortBy('id'),

            Column::delete()
                ->alignRight()
                ->label('Delete')
                ->sortBy('id')

        ];
    }
}
