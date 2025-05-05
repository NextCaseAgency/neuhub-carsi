<?php

namespace App\Filament\Fabricator\PageBlocks\Global;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class ContentImage extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('global.content-image')
            ->schema([
                TextInput::make('title')
                    ->label('Başlık')
                    ->required()
                    ->placeholder('Başlık giriniz...')
                    ->columnSpan([
                        'sm' => 2,
                        'xl' => 6,
                        '2xl' => 6,
                    ]),
                Textarea::make('description')
                    ->label('Açıklama')
                    ->placeholder('Açıklama giriniz...')
                    ->columnSpan([
                        'sm' => 2,
                        'xl' => 6,
                        '2xl' => 6,
                    ]),
                FileUpload::make('image')
                    ->columnSpan([
                        'sm' => 2,
                        'xl' => 6,
                        '2xl' => 6,
                    ])
                    ->label('Görsel')
                    ->image()
                    ->maxSize(150000)
                    ->disk('public')
                    ->required()
                    ->directory('img'),
                TextInput::make('content_title')
                    ->label('İçerik Başlık')
                    ->required()
                    ->placeholder('İçerik Başlık giriniz...')
                    ->columnSpan([
                        'sm' => 2,
                        'xl' => 6,
                        '2xl' => 6,
                    ]),
                Textarea::make('content_description')
                    ->label('İçerik Açıklama')
                    ->placeholder('İçerik Açıklama giriniz...')
                    ->columnSpan([
                        'sm' => 2,
                        'xl' => 6,
                        '2xl' => 6,
                    ]),
            ])->label('ContentImage');
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}
