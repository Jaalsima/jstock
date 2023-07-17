<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\User;

class UserDatatable extends DataTableComponent
{
    protected $model = User::class;

    public ?bool $searchFilterLazy = true;



    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable()
                ->searchable(),
            Column::make("Name", "name")
                ->searchable()
                ->sortable(),
            Column::make("Email", "email")
                ->sortable()
                ->searchable(),
            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->sortable(),
            Column::make("Acciones")
                ->label(fn ($row) => view('action_buttons', compact('row')))
        ];
    }
}
