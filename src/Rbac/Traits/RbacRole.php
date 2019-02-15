<?php
namespace Jackchow\Rbac\Traits;

use think\facade\Cache;

trait RbacRole
{
    /**
     * Many-to-Many relations with the user model.
     *
     * @return mixed
     */
    public function perms()
    {
        return $this->belongsToMany(config('database.prefix').config('rbac.permission'), config('database.prefix').config('rbac.permission_role_table'),config('rbac.permission_foreign_key'),config('rbac.role_foreign_key'));
    }

    /**
     * Many-to-Many relations with the user model.
     *
     * @return mixed
     */
    public function users()
    {
        return $this->belongsToMany(config('database.prefix').config('rbac.user'), config('database.prefix').config('rbac.role_user_table'),config('rbac.user_foreign_key'),config('rbac.role_foreign_key'));
    }

    public function cachedPermissions()
    {
        $cacheKey = 'rbac_permissions_for_role_'.$this[$this->pk];
        return Cache::remember($cacheKey, function () {
            return $this->perms;
        });
    }

    /**
     * Save the inputted permissions.
     *
     * @param mixed $inputPermissions
     *
     * @return void
     */
    public function savePermissions($inputPermissions)
    {
        if (!empty($inputPermissions)) {
            $this->perms()->sync($inputPermissions);
        } else {
            $this->perms()->detach();
        }
    }

    /**
     * Attach permission to current role.
     *
     * @param object|array $permission
     *
     * @return void
     */
    public function attachPermission($permission)
    {
        if (is_object($permission)) {
            $permission = $permission->getKey();
        }

        if (is_array($permission)) {
            $permission = $permission['id'];
        }

        $this->perms()->attach($permission);
    }

    /**
     * Detach permission from current role.
     *
     * @param object|array $permission
     *
     * @return void
     */
    public function detachPermission($permission)
    {
        if (is_object($permission))
            $permission = $permission->getKey();

        if (is_array($permission))
            $permission = $permission['id'];

        $this->perms()->detach($permission);
    }

    /**
     * Attach multiple permissions to current role.
     *
     * @param mixed $permissions
     *
     * @return void
     */
    public function attachPermissions($permissions)
    {
        foreach ($permissions as $permission) {
            $this->attachPermission($permission);
        }
    }

    /**
     * Detach multiple permissions from current role
     *
     * @param mixed $permissions
     *
     * @return void
     */
    public function detachPermissions($permissions)
    {
        foreach ($permissions as $permission) {
            $this->detachPermission($permission);
        }
    }
}
