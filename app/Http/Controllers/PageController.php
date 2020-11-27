<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PageController extends MainController
{public function home(){

self::$data["title"].=' Home Page';
return view("content.home",self::$data);
}





    public function content($url){


$contents=DB::table('menus')
->join('contents', 'menus.id', '=', 'contents.menu_id')
->where('menus.url', $url)
->get()->toArray();
;
if(!empty($contents)){
self::$data['title'].=$contents[0]->title;
self::$data['contents']=$contents;
return view('content.content',self::$data);
    }
    else{
abort('404');
}
    }
}