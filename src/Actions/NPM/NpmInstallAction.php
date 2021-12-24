<?php

namespace RalphJSmit\TallInstall\Actions\NPM;

use RalphJSmit\TallInstall\Exceptions\NpmInstallFailedException;
use Symfony\Component\Process\Process;

class NpmInstallAction
{
    public function execute(array $arguments, string $basepath)
    {
        $process = new Process(
            array_merge(['npm', 'install'], $arguments),
            $basepath,
        );
        $process->run();

        if ( ! $process->isSuccessful() ) {
            throw new NpmInstallFailedException($process);
        }
    }
}
