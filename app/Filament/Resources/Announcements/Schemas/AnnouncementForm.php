<?php

namespace App\Filament\Resources\Announcements\Schemas;

use Filament\Forms\Components\RichEditor;
use Filament\Schemas\Schema;

class AnnouncementForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                RichEditor::make('title')
                    ->label('Judul Pengumuman')
                    ->toolbarButtons([
                        'bold',
                        'italic',
                        'underline',
                        'strike',
                    ])
                    ->required()
                    ->columnSpanFull(),
                RichEditor::make('content')
                    ->label('Isi Pengumuman')
                    ->toolbarButtons([
                        'bold',
                        'italic',
                        'underline',
                        'strike',
                        'bulletList',
                        'orderedList',
                        'link',
                    ])
                    ->required()
                    ->columnSpanFull(),
            ]);
    }
}
