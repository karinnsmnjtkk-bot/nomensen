<?php

namespace App\Filament\Resources\Cooperations\Schemas;

use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class CooperationInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                ImageEntry::make('image')
                    ->label('Logo Kerja Sama')
                    ->disk('public')
                    ->height(200)
                    ->circular()
                    ->columnSpanFull(),
                TextEntry::make('created_at')
                    ->label('Ditambahkan')
                    ->dateTime('d M Y H:i')
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->label('Diperbarui')
                    ->dateTime('d M Y H:i')
                    ->placeholder('-'),
            ]);
    }
}
