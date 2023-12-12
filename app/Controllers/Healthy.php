<?php
namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;

class Healthy extends BaseController{

    use ResponseTrait;

    function index(){
        $response = [
            "code" => 200,
            "message" => "System is Health",
        ];
        return $this->respondCreated($response);
    }
}