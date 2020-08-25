<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Unit;

class DeleteUnit extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'deleteUnit';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This is for completely delete Unit from database';

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
        $this->info('Deleting Items..');

        $soft_deletes = Unit::onlyTrashed()->where('deleted_at','<', now()->subDay(11));
        $count = $soft_deletes->count();

        if($count){
            $soft_deletes->forceDelete();
        }

        $this->info("{$count} unit(s) Deleted");
        return 0;
    }
}
