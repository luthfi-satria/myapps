<?php
namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;

class MenusController extends BaseController{
    use ResponseTrait;
    function index(){
        $response = [
            "code" => 200,
            "message" => "menus Controller",
        ];

        return $this->respondCreated($response);
    }
}