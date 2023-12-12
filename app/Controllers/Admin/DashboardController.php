<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\View\View;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class DashboardController extends BaseController
{
    use ResponseTrait;

    function __construct()
    {
    }
    
    public function index()
    {
        try{
            $key = getenv('JWT_SECRET');
            $token = $this->request->getGet('token');
            if($token){
                $decode = JWT::decode(strval($token), new Key($key, 'HS256'));
                if(!$decode){
                    throw new \Exception('Malformed Token');
                }
            }
            return View('admin/modules/dashboard/main', [
                'cache' => true
            ]);
        }catch(\Exception $err){
            return redirect()->route('auth/login');
        }
    }
}
