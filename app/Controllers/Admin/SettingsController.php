<?php
namespace App\Controllers\Admin;

use App\Models\validation\Settings;
use App\Services\SettingsService;

class SettingsController extends AdminController{
    private $settingService;
    function __construct()
    {
        $this->settingService = new SettingsService;
    }

    function index(){
        return $this->webview('admin/modules/dashboard/settings');
    }

    function list(){
        try{
            $config = $this->settingService->getAllConfig($this->request);
            return $this->responseSuccess('fetch success',$config);
        }catch(\Exception $err){
            return $this->fail($err->getMessage());
        }
    }

    function detail($key){
        try{
            $config = $this->settingService->getDetailConfig(['ckey' => $key]);
            return $this->responseSuccess('detail success',['data' => $config]);
        }catch(\Exception $err){
            return $this->fail($err->getMessage());
        }
    }

    function update(){
        try{
            $input = $this->request->getJSON();
            $rules = Settings::Update();
            if(! $this->validate($rules)){
                return $this->failValidationErrors(
                    $this->validator->getErrors()
                );
            }
            $update = $this->settingService->update((array) $input);
            return $this->responseSuccess('update success', ['data' => $update]);
        }catch(\Exception $err){
            return $this->fail($err->getMessage());
        }
    }
}