<?php
namespace App\Controllers\Admin;

use App\Services\UsergroupService;

class UsergroupsController extends AdminController{
    private $usergroupService;
    function __construct()
    {
        $this->usergroupService = new UsergroupService;
    }

    function index(){
        try{
            return $this->webview('admin/modules/dashboard/usergroup');
        }catch(\Exception $err){
            return $this->fail($err->getMessage());
        }
    }

    function list(){
        try{
            $list = $this->usergroupService->list($this->request);
            return $this->responseSuccess('List Fetched', $list);
        }catch(\Exception $err){
            return $this->fail($err->getMessage());
        }
    }

    function detail($id){
        try{
            $list = $this->usergroupService->detail($id);
            return $this->responseSuccess('detail success', ['data' => $list]);
        }catch(\Exception $err){
            return $this->fail($err->getMessage());
        }
    }

    function create(){
        try{
            $input = $this->request->getJSON();
            $rules = [
                'name' => 'required|alpha_space',
            ];
            if(! $this->validate($rules)){
                return $this->failValidationErrors(
                    $this->validator->getErrors()
                );
            }
            $update = $this->usergroupService->create((array) $input);
            return $this->responseSuccess('update success', ['data' => $update]);            
        }catch(\Exception $err){
            return $this->fail($err->getMessage());
        }
    }

    function update($id){
        try{
            $input = $this->request->getJSON();
            $rules = [
                'name' => 'required|alpha_space',
            ];
            if(! $this->validate($rules)){
                return $this->failValidationErrors(
                    $this->validator->getErrors()
                );
            }
            $update = $this->usergroupService->update($id, (array) $input);
            return $this->responseSuccess('update success', ['data' => $update]);
        }catch(\Exception $err){
            return $this->fail($err->getMessage());
        }
    }

    function delete(){

        try{
            
        }catch(\Exception $err){
            return $this->fail($err->getMessage());
        }
    }
}