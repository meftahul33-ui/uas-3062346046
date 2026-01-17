<?php

namespace App\Filament\Resources\Biodatas;

use App\Filament\Resources\Biodatas\Pages\CreateBiodata;
use App\Filament\Resources\Biodatas\Pages\EditBiodata;
use App\Filament\Resources\Biodatas\Pages\ListBiodatas;
use App\Filament\Resources\Biodatas\Schemas\BiodataForm;
use App\Filament\Resources\Biodatas\Tables\BiodatasTable;
use App\Models\Biodata;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class BiodataResource extends Resource
{
    protected static ?string $model = Biodata::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'nama';

    public static function form(Schema $schema): Schema
    {
        return $schema->schema(BiodataForm::configure());
    }

    public static function table(Table $table): Table
    {
        return BiodatasTable::configure($table);
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
            'index' => ListBiodatas::route('/'),
            'create' => CreateBiodata::route('/create'),
            'edit' => EditBiodata::route('/{record}/edit'),
        ];
    }
}
