<?php

namespace RalphJSmit\TallInstall\Actions\TALL;

use RalphJSmit\TallInstall\Actions\Composer\ComposerInstallAction;

class InstallLivewireAction
{
    public function __construct(
        private ComposerInstallAction $composerInstallAction,
    ) {
    }

    public function execute(string $basePath): void
    {
        $this->composerInstallAction->execute(['livewire/livewire'], $basePath);
    }
}
