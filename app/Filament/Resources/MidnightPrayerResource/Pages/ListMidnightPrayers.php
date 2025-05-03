<?php

namespace App\Filament\Resources\MidnightPrayerResource\Pages;

use App\Filament\Resources\MidnightPrayerResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMidnightPrayers extends ListRecords
{
    protected static string $resource = MidnightPrayerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
