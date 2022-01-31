<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function proxy($path, Request $request){

        $guzzle = new Client();
        $response = $guzzle->get("https://tahvel.edu.ee/hois_back/timetableevents/$path?" . urldecode($request->getQueryString()));
        $body = $response->getBody()->getContents();
        return $body;
    }

    public function getNewPosts(Request $request){
        $posts = Post::whereDate('created_at', '>=', Carbon::createFromTimeString($request->query('from')))
            ->whereTime('created_at', '>',Carbon::createFromTimeString($request->query('from')) )->get();
        return $posts;
    }

    public function getNewPostsOrWait(Request $request){

        do {
            $posts = Post::whereDate('created_at', '>=', Carbon::createFromTimeString($request->query('from')))
                ->whereTime('created_at', '>', Carbon::createFromTimeString($request->query('from')))->get();
            if(!$posts->count()){
                sleep(1);
            }
        } while(!$posts->count());
        return $posts;
    }
}
