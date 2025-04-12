<?php

namespace App\Filament\Resources\SermonResource\Pages;

use App\Filament\Resources\SermonResource;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;

class ListSermons extends ListRecords
{
    protected static string $resource = SermonResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
    public function getTabs(): array
    {
        return [
            'all' => Tab::make('All'),

            'published' => Tab::make('Published')
                ->modifyQueryUsing(function ($query) {
                    $query->where('status', 'published');
                })
                ->icon('heroicon-o-check-badge'),

            'pending' => Tab::make('Draft')
                ->modifyQueryUsing(function ($query) {
                    $query->where('status','draft');
                })
                ->icon('heroicon-o-clock'),

            'deleted' => Tab::make('Deleted')
                ->modifyQueryUsing(function ($query) {
                    $query->onlyTrashed();
                })
                ->icon('heroicon-o-trash'),
        ];

    }
}
