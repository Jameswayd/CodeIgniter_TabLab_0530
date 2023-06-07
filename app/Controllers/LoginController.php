<?php

//http://localhost:8080/LoginController/index
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LoginModel;

class LoginController extends BaseController
{
    public function index()
    {
        // 顯示登入頁面
        return view('login');
    }

    public function login()
    {
        // 獲取輸入的帳號和密碼
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // 連線到資料庫
        $loginModel = new LoginModel();

        // 在資料庫中查詢帳號
        $user = $loginModel->getUserByUsername($username);

        // 驗證帳號密碼
        if ($user && $user->password  === $password) {
            // 登入成功，導向到主頁或其他需要驗證的頁面
            return redirect()->to('dashboard');
        } else {
            // 登入失敗，顯示錯誤訊息並重新導向到登入頁面
            return redirect()->to('login')->with('error', '帳號或密碼錯誤');
        }
    }

    public function logout()
    {
        // 執行登出操作
        // 重新導向到登入頁面
        return redirect()->to('login');
    }
}