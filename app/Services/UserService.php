<?php

namespace App\Services;

use App\Models\UserModel;
use Exception;

class UserService {
    var $db;
    function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    function GetUserByEmail($email){
        try{
            $user = $this->db->table('users')
                            ->where([
                                'email' => $email,
                            ])
                            ->get()
                            ->getRowArray();
            return $user;
        }catch(Exception $err){
            throw $err;
            return $err;
        }
    }
}