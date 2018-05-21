<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;
use App\Common\InstagramWidgetGenerator;

class InstagramWidgetGenerate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'instagramwidget:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generates instagram widget feeds for users as static html files';

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
        $this->info('Generating widgets...');

        $users = User::where('graph_instagram_id', '!=', null)->get();

        foreach ($users as $user) {
            InstagramWidgetGenerator::generate($user);
            $this->info('Generating for '.$user->name );
        }

        $this->info('');
        $this->info('Completed!');
    }
}
