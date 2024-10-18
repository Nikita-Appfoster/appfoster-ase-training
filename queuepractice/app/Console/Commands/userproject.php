<?php

namespace App\Console\Commands;

use App\Models\Project;
use Illuminate\Console\Command;

class userproject extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'userproject {id?} {--a|Active}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'show user"s project';

    /**
     * Execute the console command.
     */
    public function handle()
    {

       if ($this->option('Active')){
        $this->info('Active users list');

        $projects = Project::whereActive(1)->get(['id', 'title', 'body', 'Active']);
         
        if ($projects->isEmpty()) {
            $this->info('No active users found');
        }
        else {
            $this->table(['id', 'title', 'body', 'Active'], $projects->toArray());
        }
        return;
     }

        if ($this->argument('id')) {
            $projects = Project::whereId($this->argument('id'))->get(['id', 'title', 'body', 'Active']);
            
           
            if (count($projects) > 0) {
              
                $this->table(['id', 'title', 'body', 'Active'], $projects->toArray());
            } else {
                $this->error('Project not found');
            }
        } else {
        
            $projects = Project::get(['id', 'title', 'body', 'Active']);
          
            $this->table(['id', 'title', 'body', 'Active'], $projects->toArray());
            $this->info('Project of user');
        }
    }
}
