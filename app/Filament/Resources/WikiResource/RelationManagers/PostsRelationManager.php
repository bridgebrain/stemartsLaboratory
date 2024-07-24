<?php

namespace App\Filament\Resources\WikiResource\RelationManagers;

use Filament\Forms;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;

class PostsRelationManager extends RelationManager
{
    protected static string $relationship = 'posts';

    protected static ?string $recordTitleAttribute = 'title';

    public function form(Forms\Form $form): Forms\Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('title')
                ->required()
                ->maxLength(255),
            Forms\Components\Textarea::make('content')
                ->required(),
            Forms\Components\TextInput::make('tags')
                ->required()
                ->placeholder('Comma separated tags')
                ->helperText('Enter tags separated by commas')
                ->afterStateUpdated(function ($state, callable $set) {
                    // Split the tags by comma and trim any whitespace
                    $tagsArray = array_map('trim', explode(',', $state));
                    $set('tags', $tagsArray);
                }),
            Forms\Components\Checkbox::make('video_only')
                ->label('Video Only'),
        ]);
    }

    public function table(Tables\Table $table): Tables\Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('title'),
            Tables\Columns\TextColumn::make('content')
                ->limit(50),
            Tables\Columns\TextColumn::make('tags')
                ->formatStateUsing(function ($state) {
                    return is_array($state) ? implode(', ', $state) : $state;
                }),
            Tables\Columns\BooleanColumn::make('video_only'),
            Tables\Columns\TextColumn::make('page_views')
                ->label('Page Views'),
        ])
        ->filters([
            //
        ])
        ->headerActions([
            Tables\Actions\CreateAction::make(),
        ])
        ->actions([
            Tables\Actions\EditAction::make(),
            Tables\Actions\DeleteAction::make(),
        ])
        ->bulkActions([
            Tables\Actions\DeleteBulkAction::make(),
        ]);
    }
}