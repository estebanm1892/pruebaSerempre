<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class importData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import-data:db';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import data and migrations';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->call('migrate');
    }
}
