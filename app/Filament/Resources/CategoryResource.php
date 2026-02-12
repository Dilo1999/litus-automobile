<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoryResource\Pages;
use App\Models\Category;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;

    protected static ?string $navigationIcon = 'heroicon-o-folder';

    protected static ?string $navigationLabel = 'Categories';

    protected static ?string $navigationGroup = 'Catalog';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Category Details')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Category Name')
                            ->required()
                            ->maxLength(255),

                        Forms\Components\Select::make('parent_id')
                            ->label('Parent Category')
                            ->relationship('parent', 'name')
                            ->searchable()
                            ->placeholder('None (top-level category)')
                            ->helperText('Leave empty for a top-level category. You can create as many levels as needed: use "Create sub-category" on any row in the list to add a child under it, then add more under that child the same way.'),
                    ])
                    ->columns(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Name')
                    ->searchable()
                    ->sortable()
                    ->formatStateUsing(fn ($record) => str_repeat('　', $record->depth) . ($record->depth > 0 ? '↳ ' : '') . $record->name),

                Tables\Columns\TextColumn::make('parent.name')
                    ->label('Parent')
                    ->sortable()
                    ->placeholder('—'),

                Tables\Columns\TextColumn::make('breadcrumb')
                    ->label('Path')
                    ->getStateUsing(fn ($record) => $record->breadcrumb)
                    ->searchable()
                    ->toggleable(),

                Tables\Columns\TextColumn::make('slug')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->since(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\Action::make('createSubCategory')
                    ->label('Create sub-category')
                    ->icon('heroicon-o-plus')
                    ->url(fn ($record) => CategoryResource::getUrl('create') . '?parent_id=' . $record->id)
                    ->visible(fn () => static::canCreate()),
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
            'index' => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategory::route('/create'),
            'edit' => Pages\EditCategory::route('/{record}/edit'),
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
