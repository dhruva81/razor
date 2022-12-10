<?php

namespace Dhruva81\Razor\Commands;

use Illuminate\Console\Command;

class RazorCommand extends Command
{
    public $signature = 'razor';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
