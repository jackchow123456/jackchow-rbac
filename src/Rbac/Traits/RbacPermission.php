<?php
namespace Jackchow\Rbac\Traits;

trait RbacPermission
{
    public function roles()
    {
        return $this->belongsToMany(config('rbac.role'), config('rbac.permission_role_table'),config('rbac.role_foreign_key'),config('rbac.permission_foreign_key'));
    }
}



