<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;

class DashboardController extends AdminController {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        return view('admin.dashboard');
    }

    public function logout() {
        \Session::forget('IsAdminLogin');
        \Session::forget('AdminName');
        return redirect('admin');
    }

}
