<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class WebController extends BaseController {

    use AuthorizesRequests,
        DispatchesJobs,
        ValidatesRequests;

    public $data = [];

    public function __construct() {
        $this->data['main_menu'] = \DB::table('categories')->where('Status', 1)->get();
        $this->data['cartTotalItems'] = 0;
        if(\Session::has('CartDetails')) {
            $this->data['cartTotalItems'] = count(\Session::get('CartDetails'));
        }
    }

}
