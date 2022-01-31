<?php

namespace App\Console\Commands;

use App\Models\Post;
use Illuminate\Console\Command;

class CreatePost extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'post:create';

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
    public function handle()
    {
        $post = new Post();
        $post->title = 'some title';
        $post->body = 'some body';
        $post->user_id = 1;
        $post->save();

        return 0;
    }
}
