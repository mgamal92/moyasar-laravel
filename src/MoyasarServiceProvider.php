<?php

namespace MG\Moyasar;

use MG\Moyasar\Commands\MoyasarCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class MoyasarServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('moyasar-laravel')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_moyasar-laravel_table')
            ->hasCommand(MoyasarCommand::class);
    }
}
