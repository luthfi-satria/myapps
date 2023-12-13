<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;


class DashboardController extends BaseController
{
    use ResponseTrait;

    function __construct()
    {
        
    }
    
    public function index()
    {
        return View('admin/modules/dashboard/main', [
            'cache' => true
        ]);
    }
}
