<?php

namespace App\Filament\Resources\Biodatas\Schemas;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\DateTimePicker;
use Filament\Schemas\Schema;

class BiodataForm
{
    public static function configure(): array
    {
        return [
            CheckboxList::make('riwayat_pendidikan')
                ->options([
                    'MI Miftahul Huda' => 'MI Miftahul Huda',
                    'MTS N Srono BWI' => 'MTS N Srono BWI',
                    'SMU Islam Lumajang' => 'SMU Islam Lumajang',
                    'S1 Universitas Muhammadiyah' => 'S1 Universitas Muhammadiyah',
                ])
                ->columns(2),

            FileUpload::make('foto')
                ->image()
                ->directory('biodata-foto')
                ->imageEditor(),

            TextInput::make('nama')->required(),
            TextInput::make('nim')->required(),
            TextInput::make('tempat_lahir')->required(),
            DateTimePicker::make('tanggal_lahir')->required(),
            Textarea::make('alamat')->required(),
            Radio::make('jenis_kelamin')
                ->options([
                    'Laki - Laki' => 'Laki - Laki',
                    'Perempuan' => 'Perempuan',
                ])
                ->required(),
            Select::make('hobby')
                ->options([
                    'Reading' => 'Reading',
                    'Sports' => 'Sports',
                    'Music' => 'Music',
                    'Travel' => 'Travel',
                    'Cooking' => 'Cooking',
                ])
                ->required(),
            TextInput::make('alamat_web')->url(),
            Textarea::make('deskripsi_diri'),

            TextInput::make('latitude')
            ->label('Latitude')
            ->numeric()
            ->step('any')
            ->nullable()
            ->helperText('Masukkan koordinat latitude lokasi Anda.'),
            TextInput::make('longitude')
            ->label('Longitude')
            ->numeric()
            ->step('any')
            ->nullable()
            ->helperText('Masukkan koordinat longitude lokasi Anda.'),

        
        ];
    }
}
