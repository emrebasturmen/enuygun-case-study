<?php

namespace App\Console\Commands;

use App\Interfaces\ProviderOne;
use App\Interfaces\ProviderTwo;
use Illuminate\Console\Command;

class InsertTasks extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'insert:tasks';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Inserts tasks from providers to database.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(ProviderOne $providerOne,ProviderTwo $providerTwo)
    {
        $providerOne->insert();
        $providerTwo->insert();

        info("Done.");
    }
}
