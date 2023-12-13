<?php
namespace App\Controllers\Admin;

use App\Services\AccessService;

class MenusController extends AdminController{
    var $accessService;

    function __construct(){
        parent::__construct();
        $this->accessService = new AccessService;
    }

    function index(){
        $response = [
            "code" => 200,
            "message" => "menus Controller",
        ];

        return $this->respondCreated($response);
    }

    function access(){
        try{
            $menus = $this->accessService->getAccessUsersByRole($this->user->role_id);
            $response = [
                "code" => 200,
                "message" => "menus Access",
                'menus' => $menus,
            ];
    
            return $this->respond($response);
        }catch(\Exception $err){
            log_message('error', $err->getMessage());
            return $this->fail($err->getMessage());
        }
    }
}