<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use DB;

class ProductsController extends AdminController {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $Data['Statuses'] = ["Inactive", "Active"];

        $Data['Products'] = DB::table('products')
                ->select('ProductID', 'CategoryName', 'Image', 'ProductName', 'products.Status', DB::raw('DATE_FORMAT(products.DateAdded, "%d-%b-%Y<br>%h:%i %p") as DateAdded'), DB::raw('DATE_FORMAT(products.DateModified, "%d-%b-%Y<br>%h:%i %p") as DateModified'))
                ->leftjoin('categories', 'categories.CategoryID', '=', 'products.CategoryID')
                ->get();

        return view('admin.products.index', $Data);
    }

    public function add() {
        $Data['Categories'] = DB::table('categories')->where('Status', 1)->pluck('CategoryName', 'CategoryID');
        return view('admin.products.add', $Data);
    }

    public function save() {

        $validator = Validator::make(Input::all(), [
                    'CategoryID' => 'required|integer|min:1',
                    'ProductName' => 'required|max:100',
                    'CostPrice' => 'required|numeric|min:0',
                    'SalePrice' => 'required|numeric|min:0',
                    'Qty' => 'required|integer|min:0',
                    'Status' => 'required|integer|min:0|max:1',
                    'Image' => 'required|image|mimes:jpeg,jpg,png'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $Data = [
                'CategoryID' => (int) Input::get('CategoryID'),
                'ProductName' => Input::get('ProductName'),
                'CostPrice' => Input::get('CostPrice'),
                'SalePrice' => Input::get('SalePrice'),
                'Qty' => Input::get('Qty'),
                'Desc' => Input::get('Desc'),
                'Status' => Input::get('Status'),
                'DateAdded' => new \DateTime()
            ];
            DB::table('products')->insert($Data);
            $ProductID = DB::getPdo()->lastInsertId();

            if (Input::hasFile('Image')) {
                $File = Input::file('Image');
                $ext = $File->getClientOriginalExtension();
                $realPath = $File->getRealPath();
                $FileName = $ProductID . '-' . str_random(5) . '.' . $ext;

                $Path = public_path('uploads') . '/products/' . $FileName;
                \Image::make($realPath)->save($Path);

                DB::table('products')
                        ->where('ProductID', $ProductID)
                        ->update([
                            'Image' => $FileName
                ]);
            }

            return redirect('admin/products')->with('success', 'Record inserted successfully');
        }
    }

    public function edit($id) {
        $Data['Product'] = DB::table('products')->where('ProductID', $id)->first();
        if (!empty($Data['Product'])) {
            $Data['Categories'] = DB::table('categories')->where('Status', 1)->pluck('CategoryName', 'CategoryID');
            return view('admin.products.edit', $Data);
        } else {
            return redirect('admin/products')->with('error', 'Invalid ID');
        }
    }

    public function update($id) {
        $validator = Validator::make(Input::all(), [
                    'CategoryID' => 'required|integer|min:1',
                    'ProductName' => 'required|max:100',
                    'CostPrice' => 'required|numeric|min:0',
                    'SalePrice' => 'required|numeric|min:0',
                    'Qty' => 'required|integer|min:0',
                    'Status' => 'required|integer|min:0|max:1',
                    'Image' => 'nullable|image|mimes:jpeg,jpg,png'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $Data = [
                'CategoryID' => (int) Input::get('CategoryID'),
                'ProductName' => Input::get('ProductName'),
                'CostPrice' => Input::get('CostPrice'),
                'SalePrice' => Input::get('SalePrice'),
                'Qty' => Input::get('Qty'),
                'Desc' => Input::get('Desc'),
                'Status' => Input::get('Status'),
                'DateModified' => new \DateTime()
            ];
            DB::table('products')->where('ProductID', $id)->update($Data);
            
            if (Input::hasFile('Image')) {
                $Prod = DB::table('products')->where('ProductID', $id)->first();
                if(\File::exists(public_path('uploads') . '/products/' . $Prod->Image)) {
                    \File::delete(public_path('uploads') . '/products/' . $Prod->Image);
                }
                
                $File = Input::file('Image');
                $ext = $File->getClientOriginalExtension();
                $realPath = $File->getRealPath();
                $FileName = $id . '-' . str_random(5) . '.' . $ext;

                $Path = public_path('uploads') . '/products/' . $FileName;
                \Image::make($realPath)->save($Path);

                DB::table('products')
                        ->where('ProductID', $id)
                        ->update([
                            'Image' => $FileName
                ]);
            }
            
            return redirect('admin/products')->with('success', 'Record updated successfully');
        }
    }

    public function delete() {
        if (Input::has('IDs') && is_array(Input::get('IDs')) && count(Input::get('IDs')) > 0) {
            $Ids = Input::get('IDs');
            DB::table('products')->whereIn('ProductID', $Ids)->delete();
            return redirect('admin/products')->with('success', 'Records deleted successfully');
        } else {
            return redirect('admin/products')->with('error', 'Please select records to delete');
        }
    }

}
