<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Filament\Resources\ProductResource;
use Filament\Resources\Pages\CreateRecord;

class CreateProduct extends CreateRecord
{
    protected static string $resource = ProductResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['sub_category'] = $data['cat_level_5'] ?? $data['cat_level_4'] ?? $data['cat_level_3'] ?? $data['cat_level_2'] ?? null;
        unset($data['cat_level_2'], $data['cat_level_3'], $data['cat_level_4'], $data['cat_level_5']);

        return $data;
    }
}

