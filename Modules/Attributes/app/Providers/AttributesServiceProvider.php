<?php

namespace Modules\Attributes\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Nwidart\Modules\Traits\PathNamespace;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;

use Livewire\Livewire;

use Modules\Attributes\Services\AttributeService;
use Modules\Attributes\Repositories\AttributeRepository;
use Modules\Attributes\Interfaces\AttributeServiceInterface;
use Modules\Attributes\Interfaces\AttributeRepositoryInterface;

use Modules\Attributes\Models\Attribute;
use Modules\Attributes\Observers\AttributeObserver;


use Modules\Attributes\Services\AttributeOptionService;
use Modules\Attributes\Repositories\AttributeOptionRepository;
use Modules\Attributes\Interfaces\AttributeOptionServiceInterface;
use Modules\Attributes\Interfaces\AttributeOptionRepositoryInterface;

use Modules\Attributes\Models\AttributeOption;
use Modules\Attributes\Observers\AttributeOptionObserver;


class AttributesServiceProvider extends ServiceProvider
{
    use PathNamespace;

    protected string $name = 'Attributes';

    protected string $nameLower = 'attributes';

    /**
     * Boot the application events.
     */
    public function boot(): void
    {
        $this->registerCommands();
        $this->registerCommandSchedules();
        $this->registerTranslations();
        $this->registerConfig();
        $this->registerViews();
        $this->loadMigrationsFrom(module_path($this->name, 'database/migrations'));
        // Register Livewire Components
        Livewire::component('attributes.get-data', \Modules\Attributes\Livewire\Attributes\GetData::class);
        Livewire::component('attributes.show', \Modules\Attributes\Livewire\Attributes\Partials\Show::class);
        Livewire::component('attributes.create', \Modules\Attributes\Livewire\Attributes\Partials\Create::class);
        Livewire::component('attributes.edit', \Modules\Attributes\Livewire\Attributes\Partials\Edit::class);
        Livewire::component('attributes.delete', \Modules\Attributes\Livewire\Attributes\Partials\Delete::class);


        Livewire::component('attribute-options.get-data', \Modules\Attributes\Livewire\AttributeOptions\GetData::class);
        Livewire::component('attribute-options.show', \Modules\Attributes\Livewire\AttributeOptions\Partials\Show::class);
        Livewire::component('attribute-options.create', \Modules\Attributes\Livewire\AttributeOptions\Partials\Create::class);
        Livewire::component('attribute-options.edit', \Modules\Attributes\Livewire\AttributeOptions\Partials\Edit::class);
        Livewire::component('attribute-options.delete', \Modules\Attributes\Livewire\AttributeOptions\Partials\Delete::class);

        // Register Observers
        Attribute::observe(AttributeObserver::class);
        AttributeOption::observe(AttributeOptionObserver::class);

    }

    /**
     * Register the service provider.
     */
    public function register(): void
    {
        $this->app->register(EventServiceProvider::class);
        $this->app->register(RouteServiceProvider::class);

        $this->app->bind(AttributeRepositoryInterface::class, AttributeRepository::class);
        $this->app->bind(AttributeServiceInterface::class, AttributeService::class);

        $this->app->bind(AttributeOptionRepositoryInterface::class, AttributeOptionRepository::class);
        $this->app->bind(AttributeOptionServiceInterface::class, AttributeOptionService::class);
    }

    /**
     * Register commands in the format of Command::class
     */
    protected function registerCommands(): void
    {
        // $this->commands([]);
    }

    /**
     * Register command Schedules.
     */
    protected function registerCommandSchedules(): void
    {
        // $this->app->booted(function () {
        //     $schedule = $this->app->make(Schedule::class);
        //     $schedule->command('inspire')->hourly();
        // });
    }

    /**
     * Register translations.
     */
    public function registerTranslations(): void
    {
        $langPath = resource_path('lang/modules/'.$this->nameLower);

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, $this->nameLower);
            $this->loadJsonTranslationsFrom($langPath);
        } else {
            $this->loadTranslationsFrom(module_path($this->name, 'lang'), $this->nameLower);
            $this->loadJsonTranslationsFrom(module_path($this->name, 'lang'));
        }
    }

    /**
     * Register config.
     */
    protected function registerConfig(): void
    {
        $configPath = module_path($this->name, config('modules.paths.generator.config.path'));

        if (is_dir($configPath)) {
            $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($configPath));

            foreach ($iterator as $file) {
                if ($file->isFile() && $file->getExtension() === 'php') {
                    $config = str_replace($configPath.DIRECTORY_SEPARATOR, '', $file->getPathname());
                    $config_key = str_replace([DIRECTORY_SEPARATOR, '.php'], ['.', ''], $config);
                    $segments = explode('.', $this->nameLower.'.'.$config_key);

                    // Remove duplicated adjacent segments
                    $normalized = [];
                    foreach ($segments as $segment) {
                        if (end($normalized) !== $segment) {
                            $normalized[] = $segment;
                        }
                    }

                    $key = ($config === 'config.php') ? $this->nameLower : implode('.', $normalized);

                    $this->publishes([$file->getPathname() => config_path($config)], 'config');
                    $this->merge_config_from($file->getPathname(), $key);
                }
            }
        }
    }

    /**
     * Merge config from the given path recursively.
     */
    protected function merge_config_from(string $path, string $key): void
    {
        $existing = config($key, []);
        $module_config = require $path;

        config([$key => array_replace_recursive($existing, $module_config)]);
    }

    /**
     * Register views.
     */
    public function registerViews(): void
    {
        $viewPath = resource_path('views/modules/'.$this->nameLower);
        $sourcePath = module_path($this->name, 'resources/views');

        $this->publishes([$sourcePath => $viewPath], ['views', $this->nameLower.'-module-views']);

        $this->loadViewsFrom(array_merge($this->getPublishableViewPaths(), [$sourcePath]), $this->nameLower);

        Blade::componentNamespace(config('modules.namespace').'\\' . $this->name . '\\View\\Components', $this->nameLower);
    }

    /**
     * Get the services provided by the provider.
     */
    public function provides(): array
    {
        return [];
    }

    private function getPublishableViewPaths(): array
    {
        $paths = [];
        foreach (config('view.paths') as $path) {
            if (is_dir($path.'/modules/'.$this->nameLower)) {
                $paths[] = $path.'/modules/'.$this->nameLower;
            }
        }

        return $paths;
    }
}
