<?php
namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;

class UsersController extends BaseController{
    use ResponseTrait;
    function index(){
        $response = [
            "code" => 200,
            "message" => "users Controller",
        ];

        return $this->respondCreated($response);
    }
}