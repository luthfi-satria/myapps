<?php
namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;

class SettingsController extends BaseController{
    use ResponseTrait;
    function index(){
        $response = [
            "code" => 200,
            "message" => "Settings Controller",
        ];

        return $this->respondCreated($response);
    }
}