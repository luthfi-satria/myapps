<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MenusModuleSeeder extends Seeder
{
    public function run()
    {
        $data = SELF::MenusModuleData();
        $this->db->table('menus_module')->upsertBatch($data, true);
    }

    static function MenusModuleData(){
        return [
            [
                'id' => 1,
                'menu_id' => 2,
                'name' => 'view setting',
                'desc' => 'view setting web information',
                'controller' => 'SettingsController',
                'method_name' => 'Index',
                'permissions' => 'view',
            ],
            [
                'id' => 2,
                'menu_id' => 2,
                'name' => 'update setting',
                'desc' => 'update web information',
                'controller' => 'SettingsController',
                'method_name' => 'UpdateSettings',
                'permissions' => 'update',
            ],
            [
                'id' => 3,
                'menu_id' => 2,
                'name' => 'export setting',
                'desc' => 'export web information',
                'controller' => 'SettingsController',
                'method_name' => 'ExportSettings',
                'permissions' => 'download',
            ],
            [
                'id' => 4,
                'menu_id' => 3,
                'name' => 'view usergroup',
                'desc' => 'view list usergroup',
                'controller' => 'UsergroupController',
                'method_name' => 'Index',
                'permissions' => 'view',
            ],
            [
                'id' => 5,
                'menu_id' => 3,
                'name' => 'insert usergroup',
                'desc' => 'insert usergroup',
                'controller' => 'UsergroupController',
                'method_name' => 'InsertUsergroup',
                'permissions' => 'insert',
            ],
            [
                'id' => 6,
                'menu_id' => 3,
                'name' => 'update usergroup',
                'desc' => 'update usergroup',
                'controller' => 'UsergroupController',
                'method_name' => 'UpdateUsergroup',
                'permissions' => 'update',
            ],
            [
                'id' => 7,
                'menu_id' => 3,
                'name' => 'delete usergroup',
                'desc' => 'delete usergroup',
                'controller' => 'UsergroupController',
                'method_name' => 'DeleteUsergroup',
                'permissions' => 'delete',
            ],
            [
                'id' => 8,
                'menu_id' => 4,
                'name' => 'view usergroup roles',
                'desc' => 'view usergroup roles',
                'controller' => 'UsergroupRolesController',
                'method_name' => 'Index',
                'permissions' => 'view',
            ],
            [
                'id' => 9,
                'menu_id' => 4,
                'name' => 'insert usergroup roles',
                'desc' => 'insert usergroup roles',
                'controller' => 'UsergroupRolesController',
                'method_name' => 'InsertRole',
                'permissions' => 'insert',
            ],
            [
                'id' => 10,
                'menu_id' => 4,
                'name' => 'update usergroup roles',
                'desc' => 'update usergroup roles',
                'controller' => 'UsergroupRolesController',
                'method_name' => 'UpdateRole',
                'permissions' => 'update',
            ],
            [
                'id' => 11,
                'menu_id' => 4,
                'name' => 'delete usergroup roles',
                'desc' => 'delete usergroup roles',
                'controller' => 'UsergroupRolesController',
                'method_name' => 'DeleteRole',
                'permissions' => 'delete',
            ],
            [
                'id' => 12,
                'menu_id' => 5,
                'name' => 'view user',
                'desc' => 'view user',
                'controller' => 'UserController',
                'method_name' => 'Index',
                'permissions' => 'view',
            ],
            [
                'id' => 13,
                'menu_id' => 5,
                'name' => 'insert user',
                'desc' => 'insert user',
                'controller' => 'UserController',
                'method_name' => 'InsertUser',
                'permissions' => 'insert',
            ],
            [
                'id' => 14,
                'menu_id' => 5,
                'name' => 'update user',
                'desc' => 'update user',
                'controller' => 'UserController',
                'method_name' => 'UpdateUser',
                'permissions' => 'update',
            ],
            [
                'id' => 15,
                'menu_id' => 5,
                'name' => 'delete user',
                'desc' => 'delete user',
                'controller' => 'UserController',
                'method_name' => 'DeleteUser',
                'permissions' => 'delete',
            ],
            [
                'id' => 16,
                'menu_id' => 5,
                'name' => 'export user',
                'desc' => 'export user',
                'controller' => 'UserController',
                'method_name' => 'ExportUser',
                'permissions' => 'download',
            ],
        ];
    }
}
