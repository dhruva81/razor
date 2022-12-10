<?php

namespace Dhruva81\Razor;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Dhruva81\Razor\Commands\RazorCommand;

class RazorServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('razor')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_razor_table')
            ->hasCommand(RazorCommand::class);
    }
}
