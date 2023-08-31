<?php

namespace App\Filament\Resources\UserResource\Pages;

use Filament\Actions;
use Filament\Infolists\Infolist;
use Filament\Support\Enums\FontWeight;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use App\Filament\Resources\UserResource;
use Filament\Resources\Pages\ViewRecord;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\Layout\View;
use Filament\Tables\Columns\Layout\Split;

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
