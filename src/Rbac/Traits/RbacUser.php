<?php
namespace Jackchow\Rbac\Traits;

use think\facade\Cache;

trait RbacUser
{
    /**
     * Many-to-Many relations with Role.
     *
     * @return mixed
     */
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

    /**
     * Check if user has a permission by its name.
     *
     * @param string|array $permission Permission string or array of permissions.
     *
     * @return bool
     */
    public function can($permission){
        foreach ($this->cachedRoles() as $role) {
            foreach ($role->cachedPermissions() as $perm) {
                if ($permission == $perm['name']) {
                    return true;
                }
            }
        }
        return false;
    }

    /**
     * Alias to eloquent many-to-many relation's attach() method.
     *
     * @param mixed $role
     */
    public function attachRole($role)
    {
        if(is_object($role)) {
            $role = $role->getKey();
        }

        if(is_array($role)) {
            $role = $role['id'];
        }

        $this->roles()->attach($role);
    }

    /**
     * Alias to eloquent many-to-many relation's detach() method.
     *
     * @param mixed $role
     */
    public function detachRole($role)
    {
        if (is_object($role)) {
            $role = $role->getKey();
        }

        if (is_array($role)) {
            $role = $role['id'];
        }

        $this->roles()->detach($role);
    }

    /**
     * Attach multiple roles to a user
     *
     * @param mixed $roles
     */
    public function attachRoles($roles)
    {
        foreach ($roles as $role) {
            $this->attachRole($role);
        }
    }

    /**
     * Detach multiple roles from a user
     *
     * @param mixed $roles
     */
    public function detachRoles($roles=null)
    {
        if (!$roles) $roles = $this->roles()->get();

        foreach ($roles as $role) {
            $this->detachRole($role);
        }
    }
}
