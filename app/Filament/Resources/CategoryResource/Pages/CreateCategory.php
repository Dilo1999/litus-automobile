<?php

namespace App\Filament\Resources\CategoryResource\Pages;

use App\Filament\Resources\CategoryResource;
use Filament\Resources\Pages\CreateRecord;

class CreateCategory extends CreateRecord
{
    protected static string $resource = CategoryResource::class;

    public function mount(): void
    {
        parent::mount();

        $parentId = request()->query('parent_id');
        if ($parentId) {
            $this->form->fill(['parent_id' => (int) $parentId]);
        }
    }
}
