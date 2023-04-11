<?php

namespace MG\Moyasar\Commands;

use Illuminate\Console\Command;

class MoyasarCommand extends Command
{
    public $signature = 'moyasar-laravel';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
