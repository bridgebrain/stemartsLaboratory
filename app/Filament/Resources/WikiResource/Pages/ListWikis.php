<?php

namespace App\Filament\Resources\WikiResource\Pages;

use App\Filament\Resources\WikiResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListWikis extends ListRecords
{
    protected static string $resource = WikiResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}