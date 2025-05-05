<?php

namespace App\Filament\Fabricator\PageBlocks\Global;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class ContentText extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('global.content-text')
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
                    ->label('Görsel')
                    ->image()
                    ->maxSize(150000)
                    ->disk('public')
                    ->directory('img')
                    ->required()
                    ->columnSpan([
                        'sm' => 2,
                        'xl' => 6,
                        '2xl' => 6,
                    ]),

                FileUpload::make('sub_image')
                    ->label('Öndeki Görsel')
                    ->image()
                    ->maxSize(150000)
                    ->disk('public')
                    ->directory('img')
                    ->required()
                    ->columnSpan([
                        'sm' => 2,
                        'xl' => 6,
                        '2xl' => 6,
                    ]),

                TextInput::make('content_title')
                    ->label('İçerik Başlığı')
                    ->required()
                    ->placeholder('İçerik başlığını giriniz...')
                    ->columnSpan([
                        'sm' => 2,
                        'xl' => 6,
                        '2xl' => 6,
                    ]),

                Textarea::make('content_description')
                    ->label('İçerik Açıklaması')
                    ->placeholder('İçerik açıklaması giriniz...')
                    ->rows(4)
                    ->columnSpan([
                        'sm' => 2,
                        'xl' => 6,
                        '2xl' => 6,
                    ]),

                RichEditor::make('content')
                    ->label('İçerik')
                    ->columnSpan([
                        'sm' => 2,
                        'xl' => 6,
                        '2xl' => 6,
                    ]),
            ])
            ->label('ContentText');
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}
