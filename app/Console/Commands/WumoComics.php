<?php

namespace App\Console\Commands;

use GuzzleHttp\Client;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\DomCrawler\Crawler;

class WumoComics extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'comic:wumo';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get wumo comics';

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
    /**
     * Execute the console command.
     *
     * @return string
     */
    public function handle()
    {

        $comics = [];
        $i=0;
        $url = "http://wumo.com/wumo";
        while($i<10){
            $body = $this->cacheOrGet($url);
            //var_dump($body);
            //var_dump($joke);
            $crawler = new Crawler($body);
            $imgEl = $crawler->filter('.box-content>a>img');
            $src = $imgEl->attr('src');
            $url = "http://wumo.com" . $crawler->filter('a.prev')->attr('href');
            $comics[] = [$src];
            $i++;
        }
        var_dump($comics);
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
