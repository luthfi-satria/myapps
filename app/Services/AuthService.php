<?php
namespace App\Services;

use Firebase\JWT\JWT;

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
    
    static function UpdateUserResetToken($refresh, $user){
        $db = \Config\Database::connect();
        return $db->table('users')
                ->set('token_reset', $refresh)
                ->where('id', $user['id'])
                ->update();
    }
}