<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Transaction;
use Illuminate\Support\Carbon;

class Delete extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:cron';

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

    // tự động chạy để lọc những xe ma trong DB //
    public function handle()
    {
        $limit = Carbon::now()->subMinute(20);
        $transaction_delete = Transaction::whereNull('image_in')->where('created_at', '<', $limit)->get();
        foreach ($transaction_delete as $Item) {
            $id = $Item->id;
            Transaction::find($id)->delete();
        };
    }
}
