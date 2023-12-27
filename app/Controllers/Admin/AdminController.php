<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Services\SettingsService;
use CodeIgniter\API\ResponseTrait;

class AdminController extends BaseController
{
    use ResponseTrait;

    function defaultData(){
        $webconfig = new SettingsService();
        $config = $webconfig->configMap();
        return [
            'cache' => true,
            'webconfig' => $config,
        ];
    }

    function webview($page='', $data = []){
        $defData = SELF::defaultData();
        $defData = array_merge($defData, $data);
        return View($page, $defData);
    }

    function responseSuccess($message, $data){
        $response = array_merge([
            'code' => 200,
            'message' => $message ?? 'fetch success',
        ], $data);
        return $this->respondCreated($response);
    }
}
