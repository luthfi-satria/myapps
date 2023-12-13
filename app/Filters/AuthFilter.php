<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class AuthFilter implements FilterInterface
{
    /**
     * Do whatever processing this filter needs to do.
     * By default it should not return anything during
     * normal execution. However, when an abnormal state
     * is found, it should return an instance of
     * CodeIgniter\HTTP\Response. If it does, script
     * execution will end and that Response will be
     * sent back to the client, allowing for error pages,
     * redirects, etc.
     *
     * @param RequestInterface $request
     * @param array|null       $arguments
     *
     * @return mixed
     */
    public function before(RequestInterface $request, $arguments = null)
    {
        try{
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
                    foreach($decoded as $key => $val){
                        if(in_array($key, ['iat','exp']) == false){
                            define(strtoupper($key), $val);
                        }
                    }
                    return $decoded;
                }
            }
            throw new \Exception('Access Denied');
        }catch(\Exception $err){
            $response = service('response');
            $response->setBody(json_encode([
                'code' => 401,
                'message' => $err->getMessage()
            ]));
            $response->setStatusCode(401);
            return $response;
        }
    }

    /**
     * Allows After filters to inspect and modify the response
     * object as needed. This method does not allow any way
     * to stop execution of other after filters, short of
     * throwing an Exception or Error.
     *
     * @param RequestInterface  $request
     * @param ResponseInterface $response
     * @param array|null        $arguments
     *
     * @return mixed
     */
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        //
    }
}
