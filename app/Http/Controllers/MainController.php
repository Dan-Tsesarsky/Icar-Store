<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Menu;
class MainController extends Controller
{
    static public $data=['title'=>'ICAR |'];
    public function __construct(){
        self::$data['menus']=Menu::all()->toArray();

    }
}