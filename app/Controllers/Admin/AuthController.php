<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use \App\Models\validation\Authentication;
use App\Services\UserService;
use Exception;

class AuthController extends BaseController{
    use ResponseTrait;
    var $userService;
    function __construct()
    {
        $this->userService = new UserService();
    }

    function index(){
        return View('admin/modules/login/login_form', [
            'jsfile' => [
                'assets/js/admin/login.js',
            ],
            'cache' => true
        ]);          
    }

    function login(){
        try{
            $input = $this->request->getPost();
            $rules = Authentication::LoginRules();

            if(! $this->validate($rules)){
                return $this->failValidationErrors(
                    $this->validator->getErrors()
                );
            }
            // Checking user exists
            $users = $this->userService->GetUserByEmail($input['email']);
            if(!empty($users)){
                $verifyPassword = password_verify($input['password'], $users['password']);
                if(!$verifyPassword){
                    return $this->failUnauthorized('invalid email or password');
                }

                // CREATE TOKEN
                $jwt = \App\Services\AuthService::JWTPayload($users);

                return $this->respondCreated([
                    'success' => true,
                    'message' => 'Login successfully',
                    'token' => $jwt,
                    'url' => base_url('admin/dashboard?token='.$jwt),
                ]);
            }
            return $this->fail('user not found');
        }
        catch(Exception $error){
            exit ($error->getMessage());
        }
    }

}