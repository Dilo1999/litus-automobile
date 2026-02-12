<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Models\Category;
use App\Filament\Resources\ProductResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProduct extends EditRecord
{
    protected static string $resource = ProductResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $path = Category::getPathFromRootToLeaf($data['category'] ?? null, $data['sub_category'] ?? null);
        $data['cat_level_2'] = $path[0] ?? null;
        $data['cat_level_3'] = $path[1] ?? null;
        $data['cat_level_4'] = $path[2] ?? null;
        $data['cat_level_5'] = $path[3] ?? null;

        return $data;
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $data['sub_category'] = $data['cat_level_5'] ?? $data['cat_level_4'] ?? $data['cat_level_3'] ?? $data['cat_level_2'] ?? null;
        unset($data['cat_level_2'], $data['cat_level_3'], $data['cat_level_4'], $data['cat_level_5']);

        return $data;
    }
}

