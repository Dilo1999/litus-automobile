<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BrandResource\Pages;
use App\Models\Brand;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class BrandResource extends Resource
{
    protected static ?string $model = Brand::class;

    protected static ?string $navigationIcon = 'heroicon-o-tag';

    protected static ?string $navigationLabel = 'Brands';

    protected static ?string $navigationGroup = 'Catalog';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Brand Details')
                ->schema([
                    Forms\Components\TextInput::make('name')
                        ->label('Brand Name')
                        ->required()
                        ->maxLength(255)
                        ->unique(ignoreRecord: true),
                    Forms\Components\FileUpload::make('logo')
                        ->label('Brand Logo')
                        ->helperText('Upload a logo image (PNG, JPG, or WebP). Recommended: square aspect ratio.')
                        ->image()
                        ->directory('brands')
                        ->disk('public')
                        ->visibility('public')
                        ->imagePreviewHeight('150')
                        ->maxSize(1024),
                ])
                ->columns(1),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('logo')
                    ->label('Logo')
                    ->disk('public')
                    ->circular()
                    ->defaultImageUrl(fn ($record) => 'https://ui-avatars.com/api/?name=' . urlencode($record->name) . '&color=7F9CF5&background=EBF4FF'),

                Tables\Columns\TextColumn::make('name')
                    ->label('Name')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->since(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()->visible(fn () => static::canEdit(null)),
                Tables\Actions\DeleteAction::make()->visible(fn () => static::canDelete(null)),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make()->visible(fn () => static::canDeleteAny()),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBrands::route('/'),
            'create' => Pages\CreateBrand::route('/create'),
            'edit' => Pages\EditBrand::route('/{record}/edit'),
        ];
    }

    public static function canViewAny(): bool
    {
        $user = auth()->user();
        if (! $user) {
            return false;
        }
        return $user->roles()->doesntExist() || $user->hasPermissionTo('view_catalog');
    }

    public static function canCreate(): bool
    {
        $user = auth()->user();
        if (! $user) {
            return false;
        }
        return $user->roles()->doesntExist() || $user->hasPermissionTo('edit_catalog');
    }

    public static function canEdit($record): bool
    {
        $user = auth()->user();
        if (! $user) {
            return false;
        }
        return $user->roles()->doesntExist() || $user->hasPermissionTo('edit_catalog');
    }

    public static function canDelete($record): bool
    {
        $user = auth()->user();
        if (! $user) {
            return false;
        }
        return $user->roles()->doesntExist() || $user->hasPermissionTo('edit_catalog');
    }

    public static function canDeleteAny(): bool
    {
        $user = auth()->user();
        if (! $user) {
            return false;
        }
        return $user->roles()->doesntExist() || $user->hasPermissionTo('edit_catalog');
    }
}

