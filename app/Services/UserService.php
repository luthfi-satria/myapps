<?php

namespace App\Services;

use Exception;

class UserService extends CoreService{
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