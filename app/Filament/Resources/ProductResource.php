<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Models\Brand;
use App\Models\Product;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';

    protected static ?string $navigationLabel = 'Products';

    protected static ?string $navigationGroup = 'Catalog';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
            Forms\Components\Section::make('Product Details')
                ->schema([
                    Forms\Components\TextInput::make('name')
                        ->label('Product Name')
                        ->required()
                        ->maxLength(255),

                    Forms\Components\TextInput::make('title')
                        ->label('Product Title')
                        ->maxLength(255),

                    Forms\Components\TextInput::make('original_price')
                        ->label('Original Price (MVR)')
                        ->numeric()
                        ->minValue(0)
                        ->step(0.01),

                    Forms\Components\TextInput::make('sale_price')
                        ->label('Sale Price (MVR)')
                        ->numeric()
                        ->minValue(0)
                        ->step(0.01),

                    Forms\Components\TextInput::make('special_discount')
                        ->label('Special Discount (MVR)')
                        ->helperText('Shown in the red badge. Leave empty to calculate from original and sale price.')
                        ->numeric()
                        ->minValue(0)
                        ->step(0.01),

                    Forms\Components\Textarea::make('description')
                        ->rows(4)
                        ->columnSpanFull(),
                ])
                ->columns(2),

            Forms\Components\Section::make('Inventory')
                ->schema([
                    Forms\Components\TextInput::make('stock')
                        ->numeric()
                        ->label('Stock Quantity')
                        ->default(0)
                        ->rule('integer')
                        ->rule('min:0'),

                    Forms\Components\Select::make('category')
                        ->label('Category')
                        ->options(fn () => \App\Models\Category::query()
                            ->whereNull('parent_id')
                            ->orderBy('name')
                            ->pluck('name', 'name')
                            ->toArray())
                        ->searchable()
                        ->required()
                        ->reactive()
                        ->afterStateUpdated(function ($set) {
                            $set('cat_level_2', null);
                            $set('cat_level_3', null);
                            $set('cat_level_4', null);
                            $set('cat_level_5', null);
                        }),

                    Forms\Components\Select::make('cat_level_2')
                        ->label('Sub Category')
                        ->options(fn ($get) => \App\Models\Category::getDirectChildrenInRoot($get('category'), null))
                        ->searchable()
                        ->placeholder('Optional')
                        ->reactive()
                        ->afterStateUpdated(function ($set) {
                            $set('cat_level_3', null);
                            $set('cat_level_4', null);
                            $set('cat_level_5', null);
                        })
                        ->visible(fn ($get) => filled($get('category'))),

                    Forms\Components\Select::make('cat_level_3')
                        ->label('Sub Sub Category')
                        ->options(fn ($get) => \App\Models\Category::getDirectChildrenInRoot($get('category'), $get('cat_level_2')))
                        ->searchable()
                        ->placeholder('Optional')
                        ->reactive()
                        ->afterStateUpdated(function ($set) {
                            $set('cat_level_4', null);
                            $set('cat_level_5', null);
                        })
                        ->visible(fn ($get) => filled($get('cat_level_2'))),

                    Forms\Components\Select::make('cat_level_4')
                        ->label('Sub Sub Sub Category')
                        ->options(fn ($get) => \App\Models\Category::getDirectChildrenInRoot($get('category'), $get('cat_level_3')))
                        ->searchable()
                        ->placeholder('Optional')
                        ->reactive()
                        ->afterStateUpdated(fn ($set) => $set('cat_level_5', null))
                        ->visible(fn ($get) => filled($get('cat_level_3'))),

                    Forms\Components\Select::make('cat_level_5')
                        ->label(fn ($get) => 'Sub Sub Sub Sub Category' . (filled($get('cat_level_4')) ? ' (' . $get('cat_level_4') . ')' : ''))
                        ->options(fn ($get) => \App\Models\Category::getDirectChildrenInRoot($get('category'), $get('cat_level_4')))
                        ->searchable()
                        ->placeholder('Optional')
                        ->visible(fn ($get) => filled($get('cat_level_4'))),
                ])
                ->columns(2),

            Forms\Components\Section::make('Brand')
                ->schema([
                    Forms\Components\Select::make('brand')
                        ->label('Brand')
                        ->options(fn () => Brand::query()->orderBy('name')->pluck('name', 'name')->toArray())
                        ->searchable()
                        ->preload(),
                ])
                ->columns(1),

            Forms\Components\Section::make('Media')
                ->schema([
                    Forms\Components\FileUpload::make('image')
                        ->label('Product Image')
                        ->image()
                        ->directory(fn () => now()->format('Y/m'))
                        ->disk('public')
                        ->imagePreviewHeight('200')
                        ->panelLayout('integrated')
                        ->enableOpen()
                        ->enableDownload()
                        ->preserveFilenames(),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label('Image')
                    ->disk('public')
                    ->square(),

                Tables\Columns\TextColumn::make('name')
                    ->label('Name')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('title')
                    ->label('Title')
                    ->toggleable()
                    ->limit(30),

                Tables\Columns\TextColumn::make('category')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('brand')
                    ->label('Brand')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('stock')
                    ->label('Stock')
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
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

