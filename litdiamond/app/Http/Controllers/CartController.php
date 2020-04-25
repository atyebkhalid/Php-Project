<?php

namespace App\Http\Controllers;

use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use DB;

class CartController extends WebController {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        return view('cart', $this->data);
    }

    public function add($ProductID) {
        $Product = DB::table('products')
                ->where('Status', 1)
                ->where('ProductID', $ProductID)
                ->first();
        if (!empty($Product)) {
            if (\Session::has('CartDetails')) {
                $SessionArray = \Session::get('CartDetails');
            } else {
                $SessionArray = [];
            }
            $ProductDetails = [
                'ProductID' => $Product->ProductID,
                'ProductName' => $Product->ProductName,
                'Image' => $Product->Image,
                'CostPrice' => $Product->CostPrice,
                'SalePrice' => $Product->SalePrice,
            ];
            array_push($SessionArray, $ProductDetails);
            \Session::put('CartDetails', $SessionArray);
//            \Session::flush();
//        \Session::forget('CartDetails');
            return redirect('product-detail/' . $ProductID)->with('success', 'Successfully Added in Cart');
        } else {
            return redirect('/');
        }
    }
     public function checkout() {
        return view('checkout', $this->data);
    }

    public function checkout_submit() {
//        dd(Input::all());
        $validator = Validator::make(Input::all(), [
                    'CustomerName' => 'required|max:30','Cell' => 'required|max:20','Email' => 'required|max:50','Address' => 'required|max:500'
        ]);if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $Data = [
                'CustomerName' => Input::get('CustomerName'),'Cell' => Input::get('Cell'),'Email' => Input::get('Email'),'Address' => Input::get('Address'),'Status' => 1,'DateAdded' => new \DateTime()
            ];
            DB::table('orders')->insert($Data);
            $OrderID = DB::getPdo()->lastInsertId();
            $SessionProducts = \Session::get('CartDetails');

            foreach ($SessionProducts as $prod) {
                $Data = [
                    'OrderID' => $OrderID,'ProductID' => $prod['ProductID'],'CostPrice' => $prod['CostPrice'],'SalePrice' => $prod['SalePrice'],'Qty' => 1,
                ];
                DB::table('order_details')->insert($Data);
            }
            \Session::flush();\Session::forget('CartDetails');return redirect('/')->with('success', 'Order Placed Successfully');
        }
    }
}
