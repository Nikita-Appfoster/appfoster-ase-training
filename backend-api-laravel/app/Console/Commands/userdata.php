<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class userdata extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:data {id?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'user data command';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        if ($this->argument('id')) {
            $user = User::whereId($this->argument('id'))->get(['id', 'name', 'username', 'email',]);
            
           
            if (count($user) > 0) {
              
                $this->table(['id', 'name', 'username', 'email'], $user->toArray());
            } else {
                $this->error('User not found');
            }
        } else {
        
            $users = User::get(['id', 'name', 'username', 'email']);
          
            $this->table(['id', 'name', 'username', 'email'], $users->toArray());
            $this->info('User data');
        }
    }
    
}
