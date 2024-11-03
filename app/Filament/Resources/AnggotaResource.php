<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AnggotaResource\Pages;
use App\Filament\Resources\AnggotaResource\RelationManagers;
use App\Models\Anggota;
use DateTime;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\SelectColumn;
use  Filament\Tables\Columns\TextColumn;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AnggotaResource extends Resource
{
    protected static ?string $model = Anggota::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                ->label('Nama_karyawan')
                ->placeholder('Masukkan Nama Karyawan'),
                TextInput::make('position')
                ->label('Posisi')
                ->placeholder('Masukkan Posisi Karyawan'),
                TextInput::make('alamat')->required()
                ->placeholder('Masukkan Alamat Karyawan'),
                Select::make('jenis_kelamin')
                ->options([
                    'Pria' => 'Pria',
                    'Wanita' => 'Wanita',
                    
                ])
                ->native(true),
                DateTimePicker::make('tanggal_lahir')
                ->seconds(false),
                TextInput::make('no_hp')
                ->required(),

            ]);
    }

/*************  ✨ Codeium Command ⭐  *************/
/******  0462f3d9-15ed-4fb6-8ed7-1cf33811c4aa  *******/
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name'),
                TextColumn::make('position'),
                TextColumn::make('alamat'),
                TextColumn::make('jenis_kelamin'), // Change this to SelectColumn
              
                TextColumn::make('tanggal_lahir')
                ->dateTime(),
                TextColumn::make('no_hp'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListAnggotas::route('/'),
            'create' => Pages\CreateAnggota::route('/create'),
            'edit' => Pages\EditAnggota::route('/{record}/edit'),
        ];
    }
}
