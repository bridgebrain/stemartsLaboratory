<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Filament\Resources\PostResource\RelationManagers;
use App\Models\Post;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = null;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([           
			Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('content')
                    ->required(),
                Forms\Components\TagsInput::make('tags')
                    ->placeholder('Comma separated tags')
                    ->helperText('Enter tags separated by commas'),
                Forms\Components\Checkbox::make('video_only')
                    ->label('Video Only')
                    ->default(false),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('tags')->label('Tags')->formatStateUsing(function ($state) {
                    return implode(', ', json_decode($state));
                }),
                Tables\Columns\BooleanColumn::make('video_only')->label('Video Only'),
                Tables\Columns\TextColumn::make('page_views')->label('Page Views')->sortable(),
                Tables\Columns\TextColumn::make('created_at')->dateTime('M d, Y')->sortable(),
            
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
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}