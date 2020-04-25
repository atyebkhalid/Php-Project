<?php

namespace App\Http\Controllers;

use App\Http\Controllers\WebController;
use DB;

class HomeController extends WebController {

    public function __construct() {
        parent::__construct();
    }

    public function index() {

        $this->data['Categories'] = DB::table('categories')->where('Status', 1)->get();
        $this->data['Products'] = DB::table('products')->where('Status', 1)->take(8)->get();
       
        
//        echo '<pre>'.print_r($this->data['main_menu'], 1).'</pre>'; die;

        return view('home', $this->data );
    }
    public function about() {

       
//        echo '<pre>'.print_r($this->data['main_menu'], 1).'</pre>'; die;

        return view('about', $this->data );
    }
    public function contact() {

       
//        echo '<pre>'.print_r($this->data['main_menu'], 1).'</pre>'; die;

        return view('contact', $this->data );
    }

}
