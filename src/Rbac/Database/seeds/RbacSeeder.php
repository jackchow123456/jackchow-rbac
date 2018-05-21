<?php

use think\migration\Seeder;

class RbacSeeder extends Seeder
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     */
    public function run()
    {
        $data = [
            [
                'name'    => 'jack',
                'password'    => md5('123456'),
                'last_login_time'    => date('Y-m-d H:i:s'),
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],[
                'name'    => 'hurray',
                'password'    => md5('123456'),
                'last_login_time'    => date('Y-m-d H:i:s'),
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ]
        ];

        $admin = $this->table('admins');
        $admin->insert($data)
            ->save();

        $data = [
            [
                'name'    => 'admin',
                'description'    => '超级管理员',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
            [
                'name'    => 'own',
                'description'    => '网站拥有者',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
            [
                'name'    => 'test',
                'description'    => '测试',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ]
        ];

        $roles = $this->table('roles');
        $roles->insert($data)
            ->save();

        $data = [
            [
                'name'          => 'index/index',
                'description'   => '后台管理首页',
                'display_menu'  => 0,
                'parent_id'     => 0,
                'level_name'    => '后台管理首页',
                'level_id'      => '1',
                'level'         => 0,
                'sort_order'    => 0,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
            [
                'name'          => 'index/main',
                'description'   => '后台管理主页',
                'display_menu'  => 1,
                'parent_id'     => 0,
                'level_name'    => '后台管理主页',
                'level_id'      => '2',
                'level'         => 0,
                'sort_order'    => 0,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
            [
                'name'          => 'index/clearCache',
                'description'   => '清除缓存',
                'display_menu'  => 0,
                'parent_id'     => 0,
                'level_name'    => '清除缓存',
                'level_id'      => '3',
                'level'         => 0,
                'sort_order'    => 0,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
            [
                'name'          => 'role/index',
                'description'   => '角色管理',
                'display_menu'  => 1,
                'parent_id'     => 0,
                'level_name'    => '角色管理',
                'level_id'      => '4',
                'level'         => 0,
                'sort_order'    => 0,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
            [
                'name'          => 'role/add',
                'description'   => '添加角色',
                'display_menu'  => 0,
                'parent_id'     => 4,
                'level_name'    => '角色管理,添加角色',
                'level_id'      => '4,5',
                'level'         => 1,
                'sort_order'    => 0,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],

        ];

        $permission = $this->table('permissions');
        $permission->insert($data)
            ->save();

        $data = [
            [
                'user_id'    => 1,
                'role_id'    => 1,
            ]
        ];

        $role_user = $this->table('role_user');
        $role_user->insert($data)
            ->save();

        $data = [
            [
                'permission_id'    => 1,
                'role_id'    => 1,
            ],
            [
                'permission_id'    => 2,
                'role_id'    => 1,
            ]
            ,
            [
                'permission_id'    => 3,
                'role_id'    => 1,
            ]
            ,
            [
                'permission_id'    => 4,
                'role_id'    => 1,
            ]
            ,
            [
                'permission_id'    => 5,
                'role_id'    => 1,
            ]

        ];

        $permission_role = $this->table('permission_role');
        $permission_role->insert($data)
            ->save();
    }
}