<?php
namespace App\Services;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class AuthService{
    static function JWTPayload($user){
        try{
            $key = getenv('JWT_SECRET');
            $iat = time();
            $exp = $iat + getenv('JWT_EXP');
            $refresh = $exp + 900;

            $payload = [
                'iat' => $iat,
                'exp' => $exp,
                'email' => $user['email'],
                'phone' => $user['phone'],
                'role_id' => $user['role_id'],
                'fname' => $user['first_name'],
                'lname' => $user['last_name'],
            ];

            $token = JWT::encode($payload, $key, 'HS256');
            $payload['exp'] = $refresh;
            $refresh = JWT::encode($payload, $key, 'HS256');
            SELF::UpdateUserResetToken($refresh, $user);
            return $token;
        }catch(\Exception $err){
            exit($err->getMessage());
        }
    }
    
    static function VerifyToken($authorization){
        try{
            $token = null;
            if(!empty($authorization)){
                if(preg_match('/Bearer\s(\S+)/', $authorization, $matches)){
                    $token = $matches[1];
                }
            }
    
            if(!empty($token)){
                $key = getenv('JWT_SECRET');
                $decoded = JWT::decode($token, new Key($key, 'HS256'));
                return $decoded;
            }
            return null;
        }
        catch(\Exception $err){
            return null;
        }
    }

    static function UpdateUserResetToken($refresh, $user){
        $db = \Config\Database::connect();
        return $db->table('users')
                ->set('token_reset', $refresh)
                ->where('id', $user['id'])
                ->update();
    }
}