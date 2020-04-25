<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use DB;

class CategoriesController extends AdminController {

    public function __construct() {
        parent::__construct();
    }
    
    public function index() {
        $Data['Statuses'] = ["Inactive", "Active"];
        
        $Data['Categories'] = DB::table('categories')
                ->select('CategoryID', 'ParentID', 'CategoryName', 'Status', 
                        DB::raw('DATE_FORMAT(DateAdded, "%d-%b-%Y<br>%h:%i %p") as DateAdded'), 
                        DB::raw('DATE_FORMAT(DateModified, "%d-%b-%Y<br>%h:%i %p") as DateModified'))
                ->get();
        
        return view('admin.categories.index', $Data);
    }
    
    public function add() {
        $Data['Categories'] = DB::table('categories')->where('Status', 1)->pluck('CategoryName', 'CategoryID');
        return view('admin.categories.add', $Data);
    }
    
    public function save() {
        $validator = Validator::make(Input::all(), [
            'CategoryName' => 'required|max:100',
            'Status' => 'required|integer|min:0|max:1',
        ]);
        
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $Data = [
                'ParentID' => (int) Input::get('ParentID'),
                'CategoryName' => Input::get('CategoryName'),
                'Status' => Input::get('Status'),
                'DateAdded' => new \DateTime()
            ];
            DB::table('categories')->insert($Data);
            return redirect('admin/categories')->with('success', 'Record inserted successfully');
        }
    }
    
    public function edit($id) {
        $Data['Category'] = DB::table('categories')->where('CategoryID', $id)->first();
        if(!empty($Data['Category'])) {
            $Data['Categories'] = DB::table('categories')->where('Status', 1)->pluck('CategoryName', 'CategoryID');
            return view('admin.categories.edit', $Data);
        } else {
            return redirect('admin/categories')->with('error', 'Invalid Category');
        }
    }
    
    public function update($id) {
        $validator = Validator::make(Input::all(), [
            'CategoryName' => 'required|max:100',
            'Status' => 'required|integer|min:0|max:1',
        ]);
        
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $Data = [
                'ParentID' => (int) Input::get('ParentID'),
                'CategoryName' => Input::get('CategoryName'),
                'Status' => Input::get('Status'),
                'DateModified' => new \DateTime()
            ];
            DB::table('categories')->where('CategoryID', $id)->update($Data);
            return redirect('admin/categories')->with('success', 'Record updated successfully');
        }
    }
    
    public function delete() {
        if(Input::has('IDs') && is_array(Input::get('IDs')) && count(Input::get('IDs')) > 0) {
            $Ids = Input::get('IDs');
            DB::table('categories')->whereIn('CategoryID', $Ids)->delete();
            return redirect('admin/categories')->with('success', 'Records deleted successfully');
        } else {
            return redirect('admin/categories')->with('error', 'Please select records to delete');
        }
    }
}
