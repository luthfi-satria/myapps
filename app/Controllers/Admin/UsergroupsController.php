<?php
namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;

class UsergroupsController extends BaseController{
    use ResponseTrait;
    function index(){
        $response = [
            "code" => 200,
            "message" => "usergroup Controller",
        ];

        return $this->respondCreated($response);
    }
}