<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EmployeeResource\Pages;
use App\Filament\Resources\EmployeeResource\RelationManagers;
use App\Filament\Resources\EmployeeResource\Widgets\EmployeeOverview;
use App\Models\Employee;
use App\Models\County;
use App\Models\Town;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Card;

use Filament\Tables\Filters\SelectFilter;
// use Filament\Forms\Component\Resources\Card;
// use Filament\Forms\Component\Resources\TextInput;
use Filament\Resources\Form;
// use Filament\Resources\County;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TimePicker;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EmployeeResource extends Resource
{
    protected static ?string $model = Employee::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationGroup = 'Management Systems';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Card::make()
                //
                ->schema([
                Select::make('county_id')
                // ->label('County')
                // ->options(County::all()->pluck('name','id')->toArray())
                // ->reactive()
                // ->afterLocationUpdate(fn (callable $stateset)=>$set('location_id', null)),
                // Select::make('location_id')
                // ->label('location')
                // ->options(function(callable $get){
                //     $county = County::find($get('county_id'));
                //     if(!$county){
                //         return Location::all()->pluck('name','id');
                //     }
                //     return $county->locations->pluck('name','id');
                // }),
                 ->relationship('county','name')->required(),
                Select::make('town_id')
                ->relationship('town','name')->required(),
                 Select::make('location_id')
                 ->relationship('location','name')->required(),
                Select::make('department_id')
                ->relationship('department','name')->required(),
                TextInput::make('first_name')->required(),
                TextInput::make('last_name')->required(),
                TextInput::make('address')->required(),
                TextInput::make('zip_code')->required(),
                TextInput::make('id_no')->required(),
                DatePicker::make('birt_date')->required(),
                DatePicker::make('date_hired')->required(),
              
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('id')->sortable(),
                TextColumn::make('first_name')->sortable()->searchable(),
                TextColumn::make('last_name')->sortable(),
                TextColumn::make('id_no')->sortable(),
                TextColumn::make('department.name')->sortable(),
                TextColumn::make('county.name')->sortable(),
                TextColumn::make('date_hired')->date(),
                TextColumn::make('created_at')->dateTime()
           
            ])
            ->filters([
                //
                SelectFilter::make('department')->relationship('department', 'name')
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
    public static function getWidgets():array
    {
       return [
        // EmployeeStatsOverview::class,
       ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEmployees::route('/'),
            'create' => Pages\CreateEmployee::route('/create'),
            'edit' => Pages\EditEmployee::route('/{record}/edit'),
        ];
    }    
}
