<?php

namespace App\Console\Commands;

use App\Jobs\ScrapeXkcd;
use Illuminate\Console\Command;

class ScrapeXkcdWithJobs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scrape:xkcdjobs';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        for($i = 2568; $i>2500; $i--){
            ScrapeXkcd::dispatch($i);
        }

        return 0;
    }
}
