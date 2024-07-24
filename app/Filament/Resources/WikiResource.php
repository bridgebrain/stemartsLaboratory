<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WikiResource\Pages;
use App\Filament\Resources\WikiResource\RelationManagers\PostsRelationManager;
use App\Models\Wiki;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;

class WikiResource extends Resource
{
    protected static ?string $model = Wiki::class;
    protected static ?string $navigationIcon = 'heroicon-o-inbox';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('title')
                ->required()
                ->maxLength(255),
            Forms\Components\Textarea::make('description'),
            Forms\Components\TextInput::make('collection'),
        ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('title'),
            Tables\Columns\TextColumn::make('description'),
            Tables\Columns\TextColumn::make('collection'),
        ])
        ->filters([
            //
        ])
        ->actions([
            Tables\Actions\EditAction::make(),
        ])
        ->bulkActions([
            Tables\Actions\DeleteBulkAction::make(),
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListWikis::route('/'),
            'create' => Pages\CreateWiki::route('/create'),
            'edit' => Pages\EditWiki::route('/{record}/edit'),
        ];
    }

    public static function getRelations(): array
    {
        return [
            PostsRelationManager::class,
        ];
    }

    public static function getNavigationGroup(): ?string
    {
        return 'Content Management';
    }
}