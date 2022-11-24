<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CountyResource\Pages;
use App\Filament\Resources\CountyResource\RelationManagers;

use App\Models\County;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CountyResource extends Resource
{
    protected static ?string $model = County::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $navigationGroup = 'Management Systems';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                //
                ->schema([
                TextInput::make('county_code')
                ->required()
                ->maxLength(7),
                TextInput::make('name')
                ->required() 
                ->maxLength(255),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //collums goes here
                TextColumn::make('id')->sortable(),
                TextColumn::make('name')->sortable()->searchable(),
                TextColumn::make('county_code')->sortable()->searchable(),
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
            'index' => Pages\ListCounties::route('/'),
            'create' => Pages\CreateCounty::route('/create'),
            'edit' => Pages\EditCounty::route('/{record}/edit'),
        ];
    }    
}
