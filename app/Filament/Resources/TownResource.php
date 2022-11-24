<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TownResource\Pages;
use App\Filament\Resources\TownResource\RelationManagers;
use App\Models\Town;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TownResource extends Resource
{
    protected static ?string $model = Town::class;

    protected static ?string $navigationIcon = 'heroicon-o-cloud';
    protected static ?string $navigationGroup = 'Management Systems';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Select::make('location_id',)
                ->relationship('location','name')
                ->required(),
                TextInput::make('name')
                ->required()
                ->maxLength(255)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('id')->sortable(),
                 TextColumn::make('name')->sortable()->searchable(),
                 TextColumn::make('location.name')->sortable(),
                 TextColumn::make('created_at')->dateTime()
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
    
    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTowns::route('/'),
            'create' => Pages\CreateTown::route('/create'),
            'edit' => Pages\EditTown::route('/{record}/edit'),
        ];
    }    
}
