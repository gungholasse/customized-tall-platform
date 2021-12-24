<?php

use RalphJSmit\TallInstall\Actions\TallInstallAction;

use function RalphJSmit\PestPluginFilesystem\contents;

beforeEach(function () {
    $this->prefix = __DIR__ . '/../tmp/laravel';
});

it('can install the TALL-stack into any project', function () {
    expect($this->prefix . '/package.json')->contents->not->toContain('"alpinejs":');
    expect($this->prefix . '/package.json')->contents->not->toContain('"@alpinejs/trap":');
    expect($this->prefix . '/composer.json')->contents->not->toContain('"filament/tables":');
    expect($this->prefix . '/package.json')->contents->not->toContain('"tailwindcss":');
    expect($this->prefix . '/package.json')->contents->toContain('"postcss":');
    expect($this->prefix . '/package.json')->contents->not->toContain('"autoprefixer":');
    expect($this->prefix . '/package.json')->contents->not->toContain('"@tailwindcss/forms":');
    expect($this->prefix . '/package.json')->contents->not->toContain('"@tailwindcss/typography":');
    expect($this->prefix . '/tailwind.config.js')->not->toExist();
    expect($this->prefix . '/composer.json')->contents->not->toContain('"livewire/livewire":');
    expect($this->prefix . '/composer.json')->contents->not->toContain('"usernotnull/tall-toasts":');
    expect($this->prefix . '/resources/css/app.css')->contents->toBe('');
    expect($this->prefix . '/resources/css/defaults.css')->not->toExist();
    expect($this->prefix . '/resources/css/pages.css')->not->toExist();
    expect($this->prefix . '/resources/js/app.js')->toExist();
    expect($this->prefix . '/resources/js/bootstrap.js')->toExist();
    expect($this->prefix . '/webpack.mix.js')->not->toHaveContents(contents(stub('webpack.mix.js')));
    expect($this->prefix . '/resources/views/layouts/app.blade.php')->not->toExist();
    expect($this->prefix . '/resources/views/layouts/admin.blade.php')->not->toExist();
    expect($this->prefix . '/resources/views/admin/layouts/header.blade.php')->not->toExist();
    expect($this->prefix . '/resources/views/components/livewire/spinner-sm.blade.php')->not->toExist();
    expect($this->prefix . '/app/View/Components/Layouts/App.php')->not->toExist();
    expect($this->prefix . '/app/View/Components/Layouts/Admin.php')->not->toExist();
    expect($this->prefix . '/app/Providers/BladeServiceProvider.php')->not->toExist();
    expect($this->prefix . '/todo')->not->toExist();

    app(TallInstallAction::class)->execute($this->prefix);

    expect($this->prefix . '/package.json')->contents->toContain('"alpinejs":');
    expect($this->prefix . '/package.json')->contents->toContain('"@alpinejs/trap":');
    expect($this->prefix . '/composer.json')->contents->toContain('"filament/tables":');
    expect($this->prefix . '/package.json')->contents->toContain('"tailwindcss":');
    expect($this->prefix . '/package.json')->contents->toContain('"postcss":');
    expect($this->prefix . '/package.json')->contents->toContain('"autoprefixer":');
    expect($this->prefix . '/package.json')->contents->toContain('"@tailwindcss/forms":');
    expect($this->prefix . '/package.json')->contents->toContain('"@tailwindcss/typography":');
    expect($this->prefix . '/tailwind.config.js')->toExist();
    expect($this->prefix . '/composer.json')->contents->toContain('"livewire/livewire":');
    expect($this->prefix . '/composer.json')->contents->toContain('"usernotnull/tall-toasts":');
    expect($this->prefix . '/resources/css/app.css')->toHaveContents(contents(stub('resources/css/app.css')));
    expect($this->prefix . '/resources/css/defaults.css')->toHaveContents(contents(stub('resources/css/defaults.css')));
    expect($this->prefix . '/resources/css/pages.css')->toHaveContents(contents(stub('resources/css/pages.css')));
    expect($this->prefix . '/resources/js/app.js')->toHaveContents(contents(stub('resources/js/app.js')));
    expect($this->prefix . '/resources/js/bootstrap.js')->not->toExist();
    expect($this->prefix . '/webpack.mix.js')->toHaveContents(contents(stub('webpack.mix.js')));
    expect($this->prefix . '/resources/views/layouts/app.blade.php')->toHaveContents(contents(stub('resources/views/layouts/app.blade.php')));
    expect($this->prefix . '/resources/views/layouts/admin.blade.php')->toHaveContents(contents(stub('resources/views/layouts/admin.blade.php')));
    expect($this->prefix . '/resources/views/admin/layouts/header.blade.php')->toHaveContents(contents(stub('resources/views/admin/layouts/header.blade.php')));
    expect($this->prefix . '/app/View/Components/Layouts/App.php')->toHaveContents(contents(stub('app/View/Components/Layouts/App.php')));
    expect($this->prefix . '/app/View/Components/Layouts/Admin.php')->toHaveContents(contents(stub('app/View/Components/Layouts/Admin.php')));
    expect($this->prefix . '/app/Providers/BladeServiceProvider.php')->toHaveContents(contents(stub('app/Providers/BladeServiceProvider.php')));
    expect($this->prefix . '/todo')->toExist();
});