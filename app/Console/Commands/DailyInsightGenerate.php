<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;
use App\Common\DailyInsightGenerator;

class DailyInsightGenerate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'insights:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetches and daily insights from instagram business accounts and saves it';

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
         $this->info('Fetching insights...');

        $users = User::where('graph_instagram_id', '!=', null)->get();

        foreach ($users as $user) {
            DailyInsightGenerator::generate($user);
            $this->info('Fetching and saving insights for '.$user->name );
        }

        $this->info('');
        $this->info('Completed!');
    }
}
