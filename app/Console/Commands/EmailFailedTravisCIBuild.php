<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Mail\DuskFailure;
use Illuminate\Support\Facades\Mail;

class EmailFailedTravisCIBuild extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:failure';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command to trigger mails of snapshots of Laravel Dusk';

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
     * @return mixed
     */
    public function handle()
    {
        Mail::to('mintu.nitish@gmail.com')->send(new DuskFailure());
    }
}
