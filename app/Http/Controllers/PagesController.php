<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{

    public function index()
    {
     $data=array();
     $data['title']="HOME | LARAVEL";
        return view('pages/index',$data);
    }
    public function about()
    {
     $data=array();
     $data['title']="About | LARAVEL";
        return view('pages/about',$data);
    }
    public function services()
    {
      
     $data=array();
     $data['title']="Services | LARAVEL";
     $data['services']=['Web design','Web development','Mobile development'];
        return view('pages/services',$data);
    }
}
