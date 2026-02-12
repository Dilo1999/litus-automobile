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

class SystemSettings extends Page
{
    use InteractsWithForms;
    use HasFormActions;

    protected static ?string $navigationIcon = 'heroicon-o-cog';

    protected static ?string $navigationLabel = 'System Settings';

    protected static ?string $title = 'System Settings';

    protected static ?string $navigationGroup = 'System Settings';

    protected static ?string $slug = 'system-settings';

    protected static ?int $navigationSort = 100;

    public ?array $data = [];

    protected static string $view = 'filament.pages.system-settings';

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
        return [
            'favicon' => Setting::get('favicon'),
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
            Forms\Components\Section::make('Website Appearance')
                ->description('Customize the appearance of your website.')
                ->schema([
                    Forms\Components\FileUpload::make('favicon')
                        ->label('Website Favicon')
                        ->helperText('Upload a favicon for your website. Recommended: .ico, .png, or .svg file (16x16 or 32x32 pixels).')
                        ->image()
                        ->directory('favicons')
                        ->disk('public')
                        ->visibility('public')
                        ->imagePreviewHeight('48')
                        ->maxSize(512),
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

        if (! empty($data['favicon'])) {
            $favicon = is_array($data['favicon']) ? ($data['favicon'][0] ?? null) : $data['favicon'];
            Setting::set('favicon', $favicon);
        } else {
            Setting::set('favicon', null);
        }

        Notification::make()
            ->title('Settings saved successfully')
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
