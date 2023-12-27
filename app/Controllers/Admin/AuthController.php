<?php

namespace App\Controllers\Admin;

use \App\Models\validation\Authentication;
use App\Services\AuthService;
use App\Services\UserService;
use Exception;

class AuthController extends AdminController{
    var $userService;
    function __construct()
    {
        $this->userService = new UserService();
    }

    function index(){
        return $this->webview('admin/modules/login/login_form');
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

    function verify_token(){
        if($this->request->hasHeader('Authorization')){
            $header = $this->request->header('Authorization');
            $verify = AuthService::VerifyToken($header);
            if(!empty($verify)){
                return $this->respondCreated([
                    'code' => 200,
                    'message' => 'Token is valid',
                    'data' => [
                        'fname' => $verify->fname,
                        'lname' => $verify->lname,
                    ],
                ], 'token is valid');
            }
        }
        return $this->failUnauthorized();
    }
}