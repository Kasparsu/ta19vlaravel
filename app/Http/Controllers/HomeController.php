<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        echo "hello laravel";
    }
    public function routeParameter($name, $id){
        dd($name, $id);
    }
}
