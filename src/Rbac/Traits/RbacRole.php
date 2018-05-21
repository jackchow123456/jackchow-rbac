<?php
namespace Jackchow\Rbac\Traits;

use think\facade\Cache;

trait RbacRole
{
    public function perms()
    {
        return $this->belongsToMany(config('rbac.permission'), config('rbac.permission_role_table'),config('rbac.permission_foreign_key'),config('rbac.role_foreign_key'));
    }

    public function cachedPermissions()
    {
        $cacheKey = 'rbac_permissions_for_role_'.$this->pk;
        return Cache::remember($cacheKey, function () {
            return $this->perms;
        });
    }
}
