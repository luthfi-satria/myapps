<?php
namespace App\Services;

class AccessService extends CoreService{
    function getAccessUsersByRole(int $role_id){
        return $this->db
                    ->table('user_access')
                    ->select([
                        'user_access.role_id',
                        'menus.id',
                        'menus.parent_id',
                        'menus.name',
                        'menus.label',
                        'menus.route_url',
                        'menus.sequence',
                        'menus.icon',
                        'menus.is_active',
                    ])
                    ->join('menus','user_access.menu_id = menus.id','left')
                    ->where([
                            'role_id' => $role_id,
                            'is_active' => 1
                        ]
                    )
                    ->orderBy('menus.parent_id', 'ASC')
                    ->orderBy('menus.sequence', 'ASC')
                    ->get()
                    ->getResultObject();
    }
}
