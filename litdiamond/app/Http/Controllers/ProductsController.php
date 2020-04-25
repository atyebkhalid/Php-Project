<?php

namespace App\Http\Controllers;

use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\DB;



class ProductsController extends WebController {

    public function __construct() {
        parent::__construct();
    }

    public function index($CategoryID) {
        $this->data['Category'] = DB::table('categories')->where('Status', 1)->where('CategoryID', $CategoryID)->first();
        if (!empty($this->data['Category'])) {
            $this->data['Products'] = DB::table('products')->where('Status', 1)->where('CategoryID', $CategoryID)->paginate(9);
            return view('products', $this->data);
        } else {
            return redirect('/');
        }
    }

    public function detail($ProductID) {
//        \Session::forget('CartDetails'); die;
//        echo '<pre>'.print_r(\Session::get('CartDetails'), 1).'</pre>'; die;
        
        $this->data['Product'] = DB::table('products')
                ->leftjoin('categories', 'categories.CategoryID', '=', 'products.CategoryID')
                ->where('products.Status', 1)
                ->where('ProductID', $ProductID)
                ->first();
        if(!empty($this->data['Product'])) {
            return view('product-detail', $this->data );
        } else {
            return redirect('/');
        }
    }

}
