<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use DB;

class OrdersController extends AdminController {

    public function __construct() {
        parent::__construct();
    }
    
    public function index() {
        $Data['Statuses'] = ["Inactive", "Active"];
        
        $Data['Order'] = DB::table('orders')
                ->select('OrderID', 'CustomerName', 'Cell','Email','Address', 'Status', 
                        DB::raw('DATE_FORMAT(DateAdded, "%d-%b-%Y<br>%h:%i %p") as DateAdded'), 
                        DB::raw('DATE_FORMAT(DateModified, "%d-%b-%Y<br>%h:%i %p") as DateModified'))
                ->get();
        
        return view('admin.orders.index', $Data);
    }
    public function order_details() {
        $Data['Order_details'] = DB::table('order_details')
                ->select('OrderDetailID', 'OrderID', 'ProductID', 'CostPrice', 'SalePrice','Qty')
                ->get();
        
        return view('admin.orders.order_details', $Data);
    }
    
}