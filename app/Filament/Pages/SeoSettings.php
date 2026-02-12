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

class SeoSettings extends Page
{
    use InteractsWithForms;
    use HasFormActions;

    protected static ?string $navigationLabel = 'SEO';

    protected static ?string $title = 'SEO';

    protected static ?string $navigationGroup = 'System Settings';

    protected static ?string $slug = 'seo';

    protected static ?int $navigationSort = 101;

    public ?array $data = [];

    protected static string $view = 'filament.pages.seo-settings';

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

        $this->form->fill($this->getSeoData());
    }

    protected function getSeoData(): array
    {
        return [
            'seo_home_meta_title' => Setting::get('seo_home_meta_title'),
            'seo_home_meta_description' => Setting::get('seo_home_meta_description'),
            'seo_home_meta_keywords' => Setting::get('seo_home_meta_keywords'),
            'seo_home_og_title' => Setting::get('seo_home_og_title'),
            'seo_home_og_description' => Setting::get('seo_home_og_description'),
            'seo_home_og_image' => Setting::get('seo_home_og_image'),
            'seo_home_robots' => Setting::get('seo_home_robots', 'index,follow'),
            'seo_about_meta_title' => Setting::get('seo_about_meta_title'),
            'seo_about_meta_description' => Setting::get('seo_about_meta_description'),
            'seo_about_meta_keywords' => Setting::get('seo_about_meta_keywords'),
            'seo_about_og_title' => Setting::get('seo_about_og_title'),
            'seo_about_og_description' => Setting::get('seo_about_og_description'),
            'seo_about_og_image' => Setting::get('seo_about_og_image'),
            'seo_about_robots' => Setting::get('seo_about_robots', 'index,follow'),
            'seo_contact_meta_title' => Setting::get('seo_contact_meta_title'),
            'seo_contact_meta_description' => Setting::get('seo_contact_meta_description'),
            'seo_contact_meta_keywords' => Setting::get('seo_contact_meta_keywords'),
            'seo_contact_og_title' => Setting::get('seo_contact_og_title'),
            'seo_contact_og_description' => Setting::get('seo_contact_og_description'),
            'seo_contact_og_image' => Setting::get('seo_contact_og_image'),
            'seo_contact_robots' => Setting::get('seo_contact_robots', 'index,follow'),
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
        $seoFields = fn (string $prefix) => [
            Forms\Components\TextInput::make("{$prefix}_meta_title")
                ->label('Meta Title')
                ->helperText('Primary title for search engines (50-60 characters recommended).')
                ->maxLength(70)
                ->columnSpanFull(),

            Forms\Components\Textarea::make("{$prefix}_meta_description")
                ->label('Meta Description')
                ->helperText('Brief summary for search results (150-160 characters recommended).')
                ->rows(3)
                ->maxLength(320)
                ->columnSpanFull(),

            Forms\Components\Textarea::make("{$prefix}_meta_keywords")
                ->label('Meta Keywords')
                ->helperText('Comma-separated keywords (optional, less impactful for modern SEO).')
                ->rows(2)
                ->columnSpanFull(),

            Forms\Components\TextInput::make("{$prefix}_og_title")
                ->label('Open Graph Title')
                ->helperText('Title when shared on Facebook, LinkedIn, etc. Falls back to Meta Title if empty.')
                ->maxLength(95)
                ->columnSpanFull(),

            Forms\Components\Textarea::make("{$prefix}_og_description")
                ->label('Open Graph Description')
                ->helperText('Description when shared on social media. Falls back to Meta Description if empty.')
                ->rows(2)
                ->maxLength(200)
                ->columnSpanFull(),

            Forms\Components\FileUpload::make("{$prefix}_og_image")
                ->label('Open Graph Image')
                ->helperText('Image shown when shared on social media (1200×630px recommended).')
                ->image()
                ->directory('seo')
                ->disk('public')
                ->imagePreviewHeight('150')
                ->maxSize(2048)
                ->columnSpanFull(),

            Forms\Components\Select::make("{$prefix}_robots")
                ->label('Robots Directive')
                ->helperText('Controls how search engines index this page.')
                ->options([
                    'index,follow' => 'Index, Follow (default)',
                    'index,nofollow' => 'Index, No Follow',
                    'noindex,follow' => 'No Index, Follow',
                    'noindex,nofollow' => 'No Index, No Follow',
                ])
                ->default('index,follow'),
        ];

        return [
            Forms\Components\Tabs::make('SEO Pages')
                ->tabs([
                    Forms\Components\Tabs\Tab::make('Home')
                        ->schema([
                            Forms\Components\Placeholder::make('seo_home_info')
                                ->label('')
                                ->content('Configure SEO for the homepage. These settings affect how your site appears in search results and when shared on social media.'),
                            ...$seoFields('seo_home'),
                        ]),
                    Forms\Components\Tabs\Tab::make('About Us')
                        ->schema([
                            Forms\Components\Placeholder::make('seo_about_info')
                                ->label('')
                                ->content('Configure SEO for the About Us page.'),
                            ...$seoFields('seo_about'),
                        ]),
                    Forms\Components\Tabs\Tab::make('Contact Us')
                        ->schema([
                            Forms\Components\Placeholder::make('seo_contact_info')
                                ->label('')
                                ->content('Configure SEO for the Contact Us page.'),
                            ...$seoFields('seo_contact'),
                        ]),
                ])
                ->columnSpanFull()
                ->persistTabInQueryString(),
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

        $seoPrefixes = ['seo_home', 'seo_about', 'seo_contact'];
        $textFields = ['meta_title', 'meta_description', 'meta_keywords', 'og_title', 'og_description', 'robots'];
        $imageFields = ['og_image'];

        foreach ($seoPrefixes as $prefix) {
            foreach ($textFields as $field) {
                $key = "{$prefix}_{$field}";
                Setting::set($key, $data[$key] ?? null);
            }
            foreach ($imageFields as $field) {
                $key = "{$prefix}_{$field}";
                $value = $data[$key] ?? null;
                if (! empty($value)) {
                    $value = is_array($value) ? ($value[0] ?? null) : $value;
                }
                Setting::set($key, $value ?? null);
            }
        }

        Notification::make()
            ->title('SEO settings saved successfully')
            ->success()
            ->send();
    }

    public static function canViewAny(): bool
    {
        $user = auth()->user();
        if (! $user) {
            return false;
        }

        return $user->roles()->doesntExist() || $user->hasPermissionTo('manage_system_settings');
    }
}
