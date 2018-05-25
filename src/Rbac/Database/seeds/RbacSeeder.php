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
                'icon'          => '',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
            [
                'name'          => 'index/main',
                'description'   => '后台管理主页',
                'display_menu'  => 0,
                'parent_id'     => 0,
                'level_name'    => '后台管理主页',
                'level_id'      => '2',
                'level'         => 0,
                'sort_order'    => 0,
                'icon'          => '',
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
                'icon'          => '',
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
                'icon'          => '',
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
                'icon'          => '',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
            [
                'name'          => 'role/store',
                'description'   => '创建角色',
                'display_menu'  => 0,
                'parent_id'     => 4,
                'level_name'    => '角色管理,创建角色',
                'level_id'      => '4,6',
                'level'         => 1,
                'sort_order'    => 0,
                'icon'          => '',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
            [
                'name'          => 'role/edit',
                'description'   => '编辑角色',
                'display_menu'  => 0,
                'parent_id'     => 4,
                'level_name'    => '角色管理,编辑角色',
                'level_id'      => '4,7',
                'level'         => 1,
                'sort_order'    => 0,
                'icon'          => '',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
            [
                'name'          => 'role/edit',
                'description'   => '修改角色',
                'display_menu'  => 0,
                'parent_id'     => 4,
                'level_name'    => '角色管理,修改角色',
                'level_id'      => '4,8',
                'level'         => 1,
                'sort_order'    => 0,
                'icon'          => '',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
            [
                'name'          => 'role/delete',
                'description'   => '删除角色',
                'display_menu'  => 0,
                'parent_id'     => 4,
                'level_name'    => '角色管理,删除角色',
                'level_id'      => '4,9',
                'level'         => 1,
                'sort_order'    => 0,
                'icon'          => '',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
            [
                'name'          => 'permission/index',
                'description'   => '权限管理',
                'display_menu'  => 1,
                'parent_id'     => 0,
                'level_name'    => '权限管理',
                'level_id'      => '10',
                'level'         => 0,
                'sort_order'    => 0,
                'icon'          => '',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
            [
                'name'          => 'permission/add',
                'description'   => '添加权限',
                'display_menu'  => 0,
                'parent_id'     => 10,
                'level_name'    => '权限管理,添加权限',
                'level_id'      => '10,11',
                'level'         => 1,
                'sort_order'    => 0,
                'icon'          => '',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
            [
                'name'          => 'permission/store',
                'description'   => '创建权限',
                'display_menu'  => 0,
                'parent_id'     => 10,
                'level_name'    => '权限管理,创建权限',
                'level_id'      => '10,12',
                'level'         => 1,
                'sort_order'    => 0,
                'icon'          => '',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
            [
                'name'          => 'permission/edit',
                'description'   => '编辑权限',
                'display_menu'  => 0,
                'parent_id'     => 10,
                'level_name'    => '权限管理,编辑权限',
                'level_id'      => '10,13',
                'level'         => 1,
                'sort_order'    => 0,
                'icon'          => '',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
            [
                'name'          => 'permission/edit',
                'description'   => '修改权限',
                'display_menu'  => 0,
                'parent_id'     => 10,
                'level_name'    => '权限管理,修改权限',
                'level_id'      => '10,14',
                'level'         => 1,
                'sort_order'    => 0,
                'icon'          => '',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
            [
                'name'          => 'permission/delete',
                'description'   => '删除权限',
                'display_menu'  => 0,
                'parent_id'     => 10,
                'level_name'    => '权限管理,删除权限',
                'level_id'      => '10,15',
                'level'         => 1,
                'sort_order'    => 0,
                'icon'          => '',
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
                'permission_id'    => 1,
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
            ,
            [
                'permission_id'    => 6,
                'role_id'    => 1,
            ]
            ,
            [
                'permission_id'    => 7,
                'role_id'    => 1,
            ]
            ,
            [
                'permission_id'    => 8,
                'role_id'    => 1,
            ]
            ,
            [
                'permission_id'    => 9,
                'role_id'    => 1,
            ]
            ,
            [
                'permission_id'    => 10,
                'role_id'    => 1,
            ],
            [
                'permission_id'    => 11,
                'role_id'    => 1,
            ]
            ,
            [
                'permission_id'    => 12,
                'role_id'    => 1,
            ]
            ,
            [
                'permission_id'    => 13,
                'role_id'    => 1,
            ],
            [
                'permission_id'    => 14,
                'role_id'    => 1,
            ],
            [
                'permission_id'    => 15,
                'role_id'    => 1,
            ]

        ];

        $permission_role = $this->table('permission_role');
        $permission_role->insert($data)
            ->save();
    }
}