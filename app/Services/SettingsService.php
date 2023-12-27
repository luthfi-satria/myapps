<?php
namespace App\Services;

class SettingsService extends CoreService{

    function configQuery(){
        return $this->db
                    ->table('configuration')
                    ->select(['ckey','name','cval','description']);
    }

    function configMap(){
        $conf = SELF::configQuery()
                ->get()
                ->getResultObject();
        $result = [];
        if(!empty($conf)){
            foreach($conf as $val){
                $result[$val->ckey] = $val->cval;
            }
        }
        return $result;
    }
    
    function getAllConfig($request){
        $page = $request->getGet('page') ?? 1;
        $size = $request->getGet('size') ?? 100;
        $offset = ($page - 1) * $size;
        return [
            'data' => SELF::configQuery()
                        ->limit($size, $offset)
                        ->get()
                        ->getResultObject(),
            'last_page' => ceil(SELF::configQuery()->countAllResults() / $size),            
        ];
    }

    function getDetailConfig($request){
        return SELF::configQuery()
                    ->where($request)
                    ->get()
                    ->getRowObject();
    }

    function update($request){
        return $this->db
                    ->table('configuration')
                    ->set($request)
                    ->where('ckey', $request['ckey'])
                    ->update();
    }
}