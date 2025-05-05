<?php

namespace App\Filament\Fabricator\PageBlocks\Global;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;

class Services extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('global.services')
            ->schema([
                Repeater::make('services') // Repeater kullanılıyor
                ->label('Hizmetler') // Repeater label'ı
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
                    Textarea::make('address')
                        ->label('Adres')
                        ->placeholder('Adres bilgisi giriniz...')
                        ->rows(4)
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
                ])
                    ->collapsible() // Repeater katlanabilir olacak
                    ->columns(1)    // Tek bir sütunda gösterilecek
                    ->minItems(1)   // Minimum bir öğe eklenmeli
                    ->maxItems(10), // Maksimum 10 öğe eklenebilir
            ])
            ->label('Hizmetler');
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}
