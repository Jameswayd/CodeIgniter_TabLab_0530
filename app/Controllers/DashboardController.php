<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class DashboardController extends BaseController
{
    public function index()
    {
        // 顯示成功登入的畫面
        return view('dashboard');
    }
}
