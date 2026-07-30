<?php

namespace App\Filament\Fabricator\PageBlocks\Global;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class Gallery extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('global.gallery')
            ->schema([
                Repeater::make('galleries')
                    ->schema([
                        TextInput::make('title')
                            ->label('Etkinlik Adı')
                            ->required()
                            ->placeholder('Örn: Seramik Boyama Atölyesi')
                            ->columnSpanFull(),
                        DatePicker::make('start_date')
                            ->label('Başlangıç Tarihi')
                            ->required()
                            ->native(false)
                            ->displayFormat('d.m.Y')
                            ->columnSpanFull(),
                        DatePicker::make('end_date')
                            ->label('Bitiş Tarihi')
                            ->native(false)
                            ->displayFormat('d.m.Y')
                            ->columnSpanFull(),
                        FileUpload::make('image')
                            ->label('Görsel')
                            ->image()
                            ->maxSize(150000)
                            ->disk('public')
                            ->required()
                            ->directory('img'),
                        TextInput::make('video')
                            ->label('Video URL (opsiyonel)')
                            ->url()
                            ->placeholder('https://www.youtube.com/watch?v=...')
                            ->columnSpanFull(),
                    ])
                    ->collapsed()
                    ->label('Etkinlikler')
                    ->itemLabel(fn (array $state): ?string => $state['title'] ?? null),
            ])->label('Galeri');
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}
