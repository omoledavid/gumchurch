<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MidnightPrayerResource\Pages;
use App\Filament\Resources\MidnightPrayerResource\RelationManagers;
use App\Models\MidnightPrayer;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Log;

class MidnightPrayerResource extends Resource
{
    protected static ?string $model = MidnightPrayer::class;

    protected static ?string $navigationIcon = 'heroicon-o-play-circle';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(191),
                Forms\Components\Textarea::make('description')
                    ->columnSpanFull(),
                Forms\Components\DateTimePicker::make('recording_date')
                    ->required(),
                Forms\Components\TextInput::make('duration')
                    ->required()
                    ->numeric()
                    ->default(0),
                Forms\Components\TextInput::make('zoom_recording_id')
                    ->required()
                    ->maxLength(191),
                Forms\Components\TextInput::make('file_url')
                    ->required()
                    ->maxLength(191),
                Forms\Components\TextInput::make('file_type')
                    ->required()
                    ->maxLength(191),
                Forms\Components\TextInput::make('file_size')
                    ->required()
                    ->numeric()
                    ->default(0),
                Forms\Components\TextInput::make('play_url')
                    ->required()
                    ->maxLength(191),
                Forms\Components\TextInput::make('status')
                    ->required()
                    ->maxLength(191)
                    ->default('pending'),
                Forms\Components\FileUpload::make('local_file_path')
                    ->disk('midnight_prayers')
                    ->visibility('private')
                    ->acceptedFileTypes(['audio/mpeg']),
                Forms\Components\TextInput::make('chapter_markers'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('recording_date')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('duration')
                    ->label('Duration')
                    ->formatStateUsing(function ($state) {
                        $minutes = (int) $state;
                        $hours = intdiv($minutes, 60);
                        $remainingMinutes = $minutes % 60;

                        if ($hours > 0) {
                            return "{$hours}h {$remainingMinutes}m";
                        }

                        return "{$remainingMinutes}m";
                    })
                    ->sortable(),
                Tables\Columns\TextColumn::make('file_size')
                    ->label('File Size')
                    ->formatStateUsing(function ($state) {
                        $size = (int) $state;
                        Log::info('File size: ' . $size);

                        if ($size == 0) return 'Unknown';

                        return $size >= 1048576
                            ? number_format($size / 1048576, 2) . ' MB'
                            : number_format($size / 1024, 2) . ' KB';
                    })
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ]),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMidnightPrayers::route('/'),
            'create' => Pages\CreateMidnightPrayer::route('/create'),
            'edit' => Pages\EditMidnightPrayer::route('/{record}/edit'),
        ];
    }
}
