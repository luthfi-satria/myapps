<?php
namespace App\Services;

class UsergroupService extends CoreService{
    function list($request){
        $page = $request->getGet('page') ?? 1;
        $size = $request->getGet('size') ?? 100;
        $name = $request->getGet('name') ?? '';
        $offset = ($page - 1) * $size;
        $usrDB = SELF::listQuery();
        if(!empty($name)){
            $usrDB->like('name', $name);
        }
        return [
            'data' => $usrDB->limit($size, $offset)
                            ->get()
                            ->getResultObject(),
            'last_page' => ceil($usrDB->countAllResults() / $size),            
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

    function delete($id){
        $usrDB = SELF::listQuery();
        return $usrDB->where('id', $id)->delete();
    }

    function listQuery(){
        return $this->db
                    ->table('usergroup');
    }
}