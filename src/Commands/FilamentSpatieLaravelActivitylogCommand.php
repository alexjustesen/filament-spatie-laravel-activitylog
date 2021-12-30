<?php

namespace RyanChandler\FilamentSpatieLaravelActivitylog\Commands;

use Illuminate\Console\Command;

class FilamentSpatieLaravelActivitylogCommand extends Command
{
    public $signature = 'filament-spatie-laravel-activitylog';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
