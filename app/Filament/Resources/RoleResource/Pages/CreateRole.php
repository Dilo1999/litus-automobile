<?php

namespace App\Filament\Resources\RoleResource\Pages;

use App\Filament\Resources\RoleResource;
use Filament\Resources\Pages\CreateRecord;

class CreateRole extends CreateRecord
{
    protected static string $resource = RoleResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Remove permissions from data - Filament's CheckboxList relationship
        // handles syncing via saveRelationships() (dehydrated fields are excluded)
        unset($data['permissions']);

        return $data;
    }
}
