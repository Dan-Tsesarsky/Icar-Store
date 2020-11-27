<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CmsController extends MainController
{
    public function dashborad(){
        self::$data['title'].='Dashborad';
       return view('cms.dashborad',self::$data);

    }
}
