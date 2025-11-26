<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SkipMigrations extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'migrate {--force : Force the operation to run when in production}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Skip migrations (this app does not use a database)';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $this->info('Skipping migrations - this application does not use a database.');
        $this->info('All content is stored in config/cv.php');
        
        return Command::SUCCESS;
    }
}
