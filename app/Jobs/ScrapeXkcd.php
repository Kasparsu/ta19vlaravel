<?php

namespace App\Jobs;

use GuzzleHttp\Client;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\DomCrawler\Crawler;

class ScrapeXkcd implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $i;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($i)
    {
        $this->i = $i;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $body = $this->cacheOrGet("https://xkcd.com/$this->i/");
        //var_dump($body);
        //var_dump($joke);
        $crawler = new Crawler($body);
        $imgEl = $crawler->filter('#comic>img');
        $src = $imgEl->attr('src');
        $contents = file_get_contents('https:' . $src);
        $name = substr($src, strrpos($src, '/') + 1);
        Storage::put($name,$contents);
    }

    public function cacheOrGet($url){
        if(Cache::has($url)){
            return Cache::get($url);
        }
        $guzzle = new Client();
        $response = $guzzle->get($url);
        $body = $response->getBody()->getContents();
        echo "Request was made \n";
        Cache::put($url, $body);
        return $body;

    }
}
