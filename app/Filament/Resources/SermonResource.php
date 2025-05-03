<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SermonResource\Pages;
use App\Filament\Resources\SermonResource\RelationManagers;
use App\Models\Series;
use App\Models\Sermon;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use FilamentTiptapEditor\TiptapEditor;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SermonResource extends Resource
{
    protected static ?string $model = Sermon::class;

    protected static ?string $navigationIcon = 'heroicon-o-musical-note';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('topic')
                    ->required()
                    ->maxLength(191),
                Forms\Components\Select::make('series_id')
                    ->label('Series')
                    ->required()
                    ->searchable()
                    ->options(Series::query()->pluck('name', 'id'))
                    ->default(Series::query()->first()->id),
                Forms\Components\TextInput::make('preacher')
                    ->required()
                    ->default('Pastor Jedi Ukoko')
                    ->maxLength(191),
                Forms\Components\Textarea::make('description')
                    ->required()
                    ->placeholder('Type in Sermon description')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('video')
                    ->placeholder('paste video link here')
                    ->maxLength(191),
                Forms\Components\Select::make('status')
                    ->options([
                        'published' => 'Published',
                        'draft' => 'Draft',
                    ])
                    ->default('published')
                    ->required(),
                Forms\Components\DateTimePicker::make('date_preached')
                    ->default(now()),
                Forms\Components\Fieldset::make('Uploads')
                    ->schema([
                        Forms\Components\FileUpload::make('thumbnail')
                            ->directory('sermons/thumbnails'),
                        Forms\Components\FileUpload::make('pdf_file')
                            ->directory('sermons/pdf'),
                        Forms\Components\FileUpload::make('image')
                            ->hint('upload size: 1188 x 598')
                            ->directory('sermons/image')
                            ->image(),
                        Forms\Components\FileUpload::make('audio')
                            ->label('Audio File')
                            ->directory('sermons/audio')
                            ->storeFileNamesIn('original_name')
                            ->visibility('public')
                            ->disk('public')
                            // ->dehydrated(true)
                            ->acceptedFileTypes(['audio/mpeg']),

                    ])->columns(4),
                TiptapEditor::make('body')
                    ->extraInputAttributes(['style' => 'max-height: 30rem; min-height: 24rem'])
                    ->columnSpanFull(),
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('topic')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('thumbnail'),
                Tables\Columns\TextColumn::make('series.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('preacher')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status'),
                Tables\Columns\TextColumn::make('date_preached')
                    ->dateTime()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->sortable(),
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
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListSermons::route('/'),
            'create' => Pages\CreateSermon::route('/create'),
            'edit' => Pages\EditSermon::route('/{record}/edit'),
        ];
    }
}
