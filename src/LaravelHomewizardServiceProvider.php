<?php

namespace TychoEngberink\LaravelHomewizard;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use TychoEngberink\LaravelHomewizard\Commands\LaravelHomewizardCommand;

class LaravelHomewizardServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-homewizard')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_laravel-homewizard_table')
            ->hasCommand(LaravelHomewizardCommand::class);
    }
}
