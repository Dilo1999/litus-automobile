<?php

namespace App\Filament\Pages;

use App\Models\Setting;
use Filament\Forms;
use Filament\Facades\Filament;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Notifications\Notification;
use Filament\Pages\Actions\Action;
use Filament\Pages\Concerns\HasFormActions;
use Filament\Pages\Page;
use Illuminate\Support\Str;
use Livewire\TemporaryUploadedFile;

class HeroSectionSettings extends Page
{
    use InteractsWithForms;
    use HasFormActions;

    protected static ?string $navigationIcon = 'heroicon-o-photograph';

    protected static ?string $navigationLabel = 'Hero Section';

    protected static ?string $title = 'Hero Section';

    protected static ?string $navigationGroup = 'Catalog';

    protected static ?string $slug = 'catalog/hero-section';

    protected static ?int $navigationSort = 10;

    public ?array $data = [];

    protected static string $view = 'filament.pages.hero-section-settings';

    public static function registerNavigationItems(): void
    {
        if (! static::canViewAny()) {
            return;
        }

        parent::registerNavigationItems();
    }

    public function mount(): void
    {
        abort_unless(static::canViewAny(), 403);

        $this->form->fill($this->getSettingsData());
    }

    protected function getSettingsData(): array
    {
        $sliderImages = Setting::get('hero_slider_images');
        if (is_string($sliderImages)) {
            $decoded = json_decode($sliderImages, true);
            $sliderImages = is_array($decoded) ? $decoded : [];
        }
        if (empty($sliderImages)) {
            $legacy = Setting::get('hero_product_image');
            $sliderImages = $legacy ? [$legacy] : [];
        }
        return [
            'hero_slider_images' => $sliderImages,
        ];
    }

    protected function getForms(): array
    {
        return [
            'form' => $this->makeForm()
                ->schema($this->getFormSchema())
                ->statePath('data')
                ->model(null),
        ];
    }

    protected function getFormSchema(): array
    {
        return [
            Forms\Components\Section::make('Hero Section')
                ->description('Customize the hero section on the homepage. Multiple images will be shown as a slider.')
                ->schema([
                    Forms\Components\FileUpload::make('hero_slider_images')
                        ->label('Hero Slider Images')
                        ->helperText('Images displayed as a slider in the hero section. Add multiple images; order is preserved. Recommended: square or 1:1 aspect ratio, PNG or WebP.')
                        ->image()
                        ->directory('hero')
                        ->disk('public')
                        ->visibility('public')
                        ->multiple()
                        ->enableReordering()
                        ->imagePreviewHeight('200')
                        ->maxSize(2048)
                        ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file): string {
                            $base = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                            $slug = Str::slug(Str::limit($base, 80));
                            $ext = $file->getClientOriginalExtension() ?: 'webp';
                            return ($slug ?: 'hero-image') . '-' . Str::lower(Str::random(6)) . '.' . $ext;
                        })
                        ->columnSpanFull(),
                ]),
        ];
    }

    protected function getFormActions(): array
    {
        return [
            Action::make('save')
                ->label('Save')
                ->submit('save')
                ->keyBindings(['mod+s']),
            Action::make('cancel')
                ->label('Cancel')
                ->url(Filament::getUrl())
                ->color('secondary'),
        ];
    }

    public function save(): void
    {
        $data = $this->form->getState();

        $images = $data['hero_slider_images'] ?? [];
        if (! is_array($images)) {
            $images = $images ? [$images] : [];
        }
        Setting::set('hero_slider_images', json_encode(array_values($images)));
        Setting::set('hero_product_image', $images[0] ?? null);

        Notification::make()
            ->title('Hero section settings saved successfully')
            ->success()
            ->send();
    }

    public static function canViewAny(): bool
    {
        $user = auth()->user();
        if (! $user) {
            return false;
        }

        return $user->roles()->doesntExist() || $user->hasPermissionTo('edit_catalog');
    }
}
