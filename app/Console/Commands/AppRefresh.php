<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;

class AppRefresh extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app-refresh';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Refresh application';


    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $filesystem = new Filesystem();
        $filesystem->cleanDirectory('storage/app/public');

        $filesystem->copy('storage/app/post-1.jpg', 'storage/app/public/post-1.jpg');
        $filesystem->copy('storage/app/post-2.jpg', 'storage/app/public/post-2.jpg');
        $filesystem->copy('storage/app/post-3.jpg', 'storage/app/public/post-3.jpg');
        $filesystem->copy('storage/app/post-4.jpg', 'storage/app/public/post-4.jpg');
        $filesystem->copy('storage/app/post-5.jpg', 'storage/app/public/post-5.jpg');
        $filesystem->copy('storage/app/post-6.jpg', 'storage/app/public/post-6.jpg');


        Artisan::call('migrate:fresh', [
            '--force' => true,
            '--seed' => true,
        ]);
    }
}
