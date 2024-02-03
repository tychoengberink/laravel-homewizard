<?php

namespace TychoEngberink\LaravelHomewizard\Commands;

use Illuminate\Console\Command;

class LaravelHomewizardCommand extends Command
{
    public $signature = 'laravel-homewizard';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
