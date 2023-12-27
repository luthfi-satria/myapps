<?php

namespace App\Controllers\Admin;

class DashboardController extends AdminController
{    
    public function index()
    {
        return $this->webview('admin/modules/dashboard/main');
    }
}
