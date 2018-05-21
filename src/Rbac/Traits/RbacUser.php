<?php
namespace Jackchow\Rbac\Traits;

use think\facade\Cache;

trait RbacUser
{
    public function roles()
    {
        return $this->belongsToMany(config('rbac.role'), config('rbac.role_user_table'),config('rbac.role_foreign_key'),config('rbac.user_foreign_key'));
    }

    public function cachedRoles()
    {
        $cacheKey = 'rbac_roles_for_user_'.$this->pk;
        return Cache::remember($cacheKey,function (){
            return $this->roles;
        });
    }

    public function can($permission){
        foreach ($this->cachedRoles() as $role) {
            foreach ($role->cachedPermissions() as $perm) {
                if ($permission == strtolower($perm['name'])) {
                    return true;
                }
            }
        }
        return false;
    }
}
