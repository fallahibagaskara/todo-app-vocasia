<?php

namespace App\Console\Commands;

use App\Models\Todo;
use Illuminate\Console\Command;

class CheckOverdueTask extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:check-overdue-task';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $overdueTasks = Todo::where('status', 'todo')
        ->where(function ($query) {
            $query->where('date', '<', now()->format('m/d/Y'))
                ->orWhere(function ($query) {
                    $query->where('date', '=', now()->format('m/d/Y'))
                        ->where('clock', '<', now()->format('H:i'));
                });
        })
        ->get();

        foreach ($overdueTasks as $task) {
            $task->status = 'overdue';
            $task->save();
        }

        $this->info('Overdue tasks checked and updated successfully.');
    }
}
