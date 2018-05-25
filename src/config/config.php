<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Rbac Role Model
    |--------------------------------------------------------------------------
    |
    | This is the Role model used by Rbac to create correct relations.  Update
    | the role if it is in a different namespace.
    |
    */
    'role' => 'app\admin\model\Roles',

    /*
    |--------------------------------------------------------------------------
    | Rbac Roles Table
    |--------------------------------------------------------------------------
    |
    | This is the roles table used by Rbac to save roles to the database.
    |
    */
    'roles_table' => 'roles',

    /*
    |--------------------------------------------------------------------------
    | Rbac Permission Model
    |--------------------------------------------------------------------------
    |
    | This is the Permission model used by Rbac to create correct relations.
    | Update the permission if it is in a different namespace.
    |
    */
    'permission' => 'app\admin\model\Permissions',

    /*
    |--------------------------------------------------------------------------
    | Rbac Permissions Table
    |--------------------------------------------------------------------------
    |
    | This is the permissions table used by Rbac to save permissions to the
    | database.
    |
    */
    'permissions_table' => 'permissions',

    /*
    |--------------------------------------------------------------------------
    | Rbac permission_role Table
    |--------------------------------------------------------------------------
    |
    | This is the permission_role table used by Rbac to save relationship
    | between permissions and roles to the database.
    |
    */
    'permission_role_table' => 'permission_role',

    /*
    |--------------------------------------------------------------------------
    | Rbac role_user Table
    |--------------------------------------------------------------------------
    |
    | This is the role_user table used by Rbac to save assigned roles to the
    | database.
    |
    */
    'role_user_table' => 'role_user',

    /*
    |--------------------------------------------------------------------------
    | User Foreign key on Rbac's role_user Table (Pivot)
    |--------------------------------------------------------------------------
    */
    'user_foreign_key' => 'user_id',

    /*
    |--------------------------------------------------------------------------
    | Role Foreign key on Rbac's role_user Table (Pivot)
    |--------------------------------------------------------------------------
    */
    'role_foreign_key' => 'role_id',

    /*
    |--------------------------------------------------------------------------
    | Rbac User Model
    |--------------------------------------------------------------------------
    |
    | This is the User model used by Rbac to create correct relations.
    | Update the user if it is in a different namespace.
    |
    */
    'user' => 'app\admin\model\Admins',

    /*
    |--------------------------------------------------------------------------
    | Rbac Users Table
    |--------------------------------------------------------------------------
    |
    | This is the users table used by Rbac to save users to the database.
    |
    */
    'user_table' => 'admins',

    /*
    |--------------------------------------------------------------------------
    | Role Foreign key on Rbac's permission_role Table (Pivot)
    |--------------------------------------------------------------------------
    */
    'permission_foreign_key' => 'permission_id',

];
