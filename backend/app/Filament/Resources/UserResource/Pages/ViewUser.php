<?php

namespace App\Filament\Resources\UserResource\Pages;

use Filament\Actions;
use Filament\Infolists\Infolist;
use App\Filament\Resources\UserResource;
use Filament\Resources\Pages\ViewRecord;

class ViewUser extends ViewRecord
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
    
}
