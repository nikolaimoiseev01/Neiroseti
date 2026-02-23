<?php

namespace App\Filament\Resources\Modules\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ModuleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()->schema([
                    TextInput::make('title')
                        ->label('Название')
                        ->required(),
                    TextInput::make('color'),
                    TextInput::make('icon'),
                    TextInput::make('description')
                        ->label('Краткое описание')
                        ->required(),
                ])->columnSpanFull()
            ]);
    }
}
