<?php

namespace App\Console\Commands;

use App\Constants\Arca as ArcaConstants;
use App\Http\Controllers\BindingController;
use App\Http\Controllers\Site\Cabinet\SponsorshipController;
use App\Http\Controllers\Site\Payments\ArcaController;
use App\Models\Donation;
use App\Models\Slider;
use App\Models\Social;
use http\Client\Curl\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Omnipay\Omnipay;

class DonateCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'donate:cron';

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
        $controller = new BindingController();
        $controller->checkBindings();
    }
}
