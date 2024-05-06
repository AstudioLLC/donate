<?php

namespace App\Console\Commands;

use App\Http\Controllers\Site\Cabinet\SponsorshipController;
use Illuminate\Console\Command;

class SponsorCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sponsor:cron';

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
        $controller = new SponsorshipController();
        $controller->postCreateStep3();
    }
}
