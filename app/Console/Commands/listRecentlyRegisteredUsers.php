<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;

class listRecentlyRegisteredUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'list:registered_users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'list recently registered users';

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
        $users = User::orderBy('created_at','desc')->take(5)->get();
        $this->info($users);
       // return $users;
    }
}
