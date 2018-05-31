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
                'icon'          => 'fa-user-o',
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
                'name'          => 'role/update',
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
                'icon'          => 'fa-list-ol',
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
                'name'          => 'permission/update',
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
            [
                'name'          => 'admin/index',
                'description'   => '用户管理',
                'display_menu'  => 1,
                'parent_id'     => 0,
                'level_name'    => '用户管理',
                'level_id'      => '16',
                'level'         => 0,
                'sort_order'    => 0,
                'icon'          => 'fa-user',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
            [
                'name'          => 'admin/add',
                'description'   => '添加用户',
                'display_menu'  => 0,
                'parent_id'     => 16,
                'level_name'    => '用户管理,添加用户',
                'level_id'      => '16,17',
                'level'         => 1,
                'sort_order'    => 0,
                'icon'          => '',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
            [
                'name'          => 'admin/store',
                'description'   => '创建用户',
                'display_menu'  => 0,
                'parent_id'     => 16,
                'level_name'    => '用户管理,创建用户',
                'level_id'      => '16,18',
                'level'         => 1,
                'sort_order'    => 0,
                'icon'          => '',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
            [
                'name'          => 'admin/edit',
                'description'   => '编辑用户',
                'display_menu'  => 0,
                'parent_id'     => 16,
                'level_name'    => '用户管理,编辑用户',
                'level_id'      => '16,19',
                'level'         => 1,
                'sort_order'    => 0,
                'icon'          => '',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
            [
                'name'          => 'admin/update',
                'description'   => '修改用户',
                'display_menu'  => 0,
                'parent_id'     => 16,
                'level_name'    => '用户管理,修改用户',
                'level_id'      => '16,20',
                'level'         => 1,
                'sort_order'    => 0,
                'icon'          => '',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
            [
                'name'          => 'admin/delete',
                'description'   => '删除用户',
                'display_menu'  => 0,
                'parent_id'     => 16,
                'level_name'    => '用户管理,删除用户',
                'level_id'      => '16,21',
                'level'         => 1,
                'sort_order'    => 0,
                'icon'          => '',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
            [
                'name'          => 'index/getNavbarList',
                'description'   => '接口--获取后台菜单列表',
                'display_menu'  => 0,
                'parent_id'     => 0,
                'level_name'    => '接口--获取后台菜单列表',
                'level_id'      => '22',
                'level'         => 0,
                'sort_order'    => 0,
                'icon'          => '',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
            [
                'name'          => 'permission/getList',
                'description'   => '接口--获取权限列表',
                'display_menu'  => 0,
                'parent_id'     => 0,
                'level_name'    => '接口--获取权限列表',
                'level_id'      => '23',
                'level'         => 0,
                'sort_order'    => 0,
                'icon'          => '',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
            [
                'name'          => 'admin/getList',
                'description'   => '接口--获取用户列表',
                'display_menu'  => 0,
                'parent_id'     => 0,
                'level_name'    => '接口--获取用户列表',
                'level_id'      => '24',
                'level'         => 0,
                'sort_order'    => 0,
                'icon'          => '',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
            [
                'name'          => 'role/getList',
                'description'   => '接口--获取角色列表',
                'display_menu'  => 0,
                'parent_id'     => 0,
                'level_name'    => '接口--获取角色列表',
                'level_id'      => '25',
                'level'         => 0,
                'sort_order'    => 0,
                'icon'          => '',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
            [
                'name'          => 'role/deleteAll',
                'description'   => '接口--删除角色记录（多条）',
                'display_menu'  => 0,
                'parent_id'     => 0,
                'level_name'    => '接口--删除角色记录（多条）',
                'level_id'      => '26',
                'level'         => 0,
                'sort_order'    => 0,
                'icon'          => '',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
            [
                'name'          => 'admin/deleteAll',
                'description'   => '接口--删除用户记录（多条）',
                'display_menu'  => 0,
                'parent_id'     => 0,
                'level_name'    => '接口--删除用户记录（多条）',
                'level_id'      => '27',
                'level'         => 0,
                'sort_order'    => 0,
                'icon'          => '',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
            [
                'name'          => 'permission/deleteAll',
                'description'   => '接口--删除权限记录（多条）',
                'display_menu'  => 0,
                'parent_id'     => 0,
                'level_name'    => '接口--删除权限记录（多条）',
                'level_id'      => '28',
                'level'         => 0,
                'sort_order'    => 0,
                'icon'          => '',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
            [
                'name'          => 'role/perm',
                'description'   => '角色权限',
                'display_menu'  => 0,
                'parent_id'     => 0,
                'level_name'    => '角色权限',
                'level_id'      => '29',
                'level'         => 0,
                'sort_order'    => 0,
                'icon'          => '',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
            [
                'name'          => 'role/perm_store',
                'description'   => '角色权限修改',
                'display_menu'  => 0,
                'parent_id'     => 0,
                'level_name'    => '角色权限修改',
                'level_id'      => '30',
                'level'         => 0,
                'sort_order'    => 0,
                'icon'          => '',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
            [
                'name'          => 'admin/role',
                'description'   => '用户角色',
                'display_menu'  => 0,
                'parent_id'     => 0,
                'level_name'    => '用户角色',
                'level_id'      => '31',
                'level'         => 0,
                'sort_order'    => 0,
                'icon'          => '',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
            [
                'name'          => 'admin/role_store',
                'description'   => '用户角色修改',
                'display_menu'  => 0,
                'parent_id'     => 0,
                'level_name'    => '用户角色修改',
                'level_id'      => '32',
                'level'         => 0,
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
            ],
            [
                'permission_id'    => 16,
                'role_id'    => 1,
            ],
            [
                'permission_id'    => 17,
                'role_id'    => 1,
            ]
            ,
            [
                'permission_id'    => 18,
                'role_id'    => 1,
            ]
            ,
            [
                'permission_id'    => 19,
                'role_id'    => 1,
            ],
            [
                'permission_id'    => 20,
                'role_id'    => 1,
            ],
            [
                'permission_id'    => 21,
                'role_id'    => 1,
            ],
            [
                'permission_id'    => 22,
                'role_id'    => 1,
            ],
            [
                'permission_id'    => 23,
                'role_id'    => 1,
            ]
            ,
            [
                'permission_id'    => 24,
                'role_id'    => 1,
            ]
            ,
            [
                'permission_id'    => 25,
                'role_id'    => 1,
            ],
            [
                'permission_id'    => 26,
                'role_id'    => 1,
            ],
            [
                'permission_id'    => 27,
                'role_id'    => 1,
            ],
            [
                'permission_id'    => 28,
                'role_id'    => 1,
            ],
            [
                'permission_id'    => 29,
                'role_id'    => 1,
            ],
            [
                'permission_id'    => 30,
                'role_id'    => 1,
            ],
            [
                'permission_id'    => 31,
                'role_id'    => 1,
            ],
            [
                'permission_id'    => 32,
                'role_id'    => 1,
            ]

        ];

        $permission_role = $this->table('permission_role');
        $permission_role->insert($data)
            ->save();
    }
}