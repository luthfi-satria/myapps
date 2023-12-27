<?php
namespace App\Libraries;

use CodeIgniter\API\ResponseTrait;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class JwtAuthenticate{
    use ResponseTrait;
    static function Verify(){
        try{
            $request = \Config\Services::request();
            if($request->hasHeader('Authorization')){
                if($request->hasHeader('Authorization')){
                    $key = getenv('JWT_SECRET');
                    $header = $request->header('Authorization');
                    $token = null;
                    if(!empty($header)){
                        if(preg_match('/Bearer\s(\S+)/', $header, $matches)){
                            $token = $matches[1];
                        }
                    }
    
                    if(!empty($token)){
                        $decoded = JWT::decode($token, new Key($key, 'HS256'));
                        return $decoded;
                    }
                }
                throw new \Exception('Access Denied');
            }
        }catch(\Exception $err){
            log_message('info', $err->getMessage());
            $response = service('response');
            $response->setContentType('application/json');
            $response->setBody(json_encode([
                'code' => 401,
                'message' => $err->getMessage()
            ]));
            $response->setStatusCode(401);
            return $response;
        }
    }
}
?>