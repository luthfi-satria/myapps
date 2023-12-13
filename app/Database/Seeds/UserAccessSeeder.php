<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserAccessSeeder extends Seeder
{
    public function run()
    {
        $data = SELF::fetch_data();
        $this->db->table('user_access')->upsertBatch($data);
    }
    
    function fetch_data(){
        $userRole = $this->db
                        ->table('user_role')
                        ->select('id')
                        ->get()
                        ->getResultArray();
        $menus = $this->db
                    ->table('menus')
                    ->select('id')
                    ->get()
                    ->getResultArray();
        $result = [];
        $i = 0;
        foreach($userRole as $key => $val){
            foreach($menus as $m => $n){
                $result[$i] = [
                    'id' => $i + 1,
                    'role_id' => $val['id'],
                    'menu_id' => $n['id']
                ];
                $i++;
            }
        }
        return $result;
    }
}
