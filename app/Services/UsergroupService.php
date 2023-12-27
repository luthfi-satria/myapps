<?php
namespace App\Services;

class UsergroupService extends CoreService{
    function list($request){
        $page = $request->getGet('page') ?? 1;
        $size = $request->getGet('size') ?? 100;
        $offset = ($page - 1) * $size;
        return [
            'data' => SELF::listQuery()
                        ->limit($size, $offset)
                        ->get()
                        ->getResultObject(),
            'last_page' => ceil(SELF::listQuery()->countAllResults() / $size),            
        ];
    }

    function detail($id){
        $usrDB = SELF::listQuery();
        $usrDB->where('id', $id);
        return $usrDB->get()->getRowArray();
    }

    function create($request){
        $usrDB = SELF::listQuery();
        return $usrDB->insert($request);
    }

    function update($id, $request){
        $usrDB = SELF::listQuery();
        return $usrDB->set($request)
                    ->where('id', $id)
                    ->update();
    }

    function delete(){

    }

    function listQuery(){
        return $this->db
                    ->table('usergroup');
    }
}