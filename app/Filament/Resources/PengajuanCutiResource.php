<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PengajuanCutiResource\Pages;
use App\Filament\Resources\PengajuanCutiResource\RelationManagers;
use App\Models\Pengajuan_Cuti;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PengajuanCutiResource extends Resource
{
    protected static ?string $model = Pengajuan_Cuti::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                 
                TextInput::make('name')->required(),
                Select::make('position')
                ->options([
                    'Karyawan Admin' => 'Karywan Admin',
                    'SPV' => 'SPV',
                    'Manager' => 'Manager',
                    'HRD' => 'HRD',
                    'IT' => 'IT',
                    
                ])
                ->native(true),
                DateTimePicker::make('tanggal_mulai')
                ->seconds(false),
                DateTimePicker::make('tanggal_selesai')
                ->seconds(false),
                TextInput::make('status')->required(),
                TextInput::make('description')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
            'index' => Pages\ListPengajuanCutis::route('/'),
            'create' => Pages\CreatePengajuanCuti::route('/create'),
            'edit' => Pages\EditPengajuanCuti::route('/{record}/edit'),
        ];
    }
}
