<?php

namespace App\Filament\Pages;

use App\Models\Biodata;
use BackedEnum;
use Filament\Pages\Page;
use Filament\Support\Icons\Heroicon;
use UnitEnum;

class TitikLokasi extends Page
{
    protected string $view = 'filament.pages.titik-lokasi';
    public static UnitEnum|string|null $navigationGroup = 'Titik Lokasi';
    public static string|null $title = 'Titik Lokasi';
    public static ?int $navigationSort = 3;

    public function getviewData(): array
    {
        $biodata = Biodata::whereNotNull('latitude')
            ->whereNotNull('longitude')
            ->get()
            ->map(function ($biodata) {
                return [
                    'nama' => $biodata->nama,
                    'nim' => $biodata->nim,
                    'alamat' => $biodata->alamat,
                    'jenis_kelamin' => $biodata->jenis_kelamin,
                    'hobby' => $biodata->hobby,
                    'latitude' => $biodata->latitude,
                    'longitude' => $biodata->longitude,
                ];
            });
            return [
                'biodata' => $biodata,
            ];

    }
}
