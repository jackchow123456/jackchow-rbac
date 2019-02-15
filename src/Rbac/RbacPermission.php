<?php
namespace Jackchow\Rbac;

use Jackchow\Rbac\Contracts\RbacPermissionInterface;
use Jackchow\Rbac\Traits\RbacPermission as RbacPermissionTraits;
use think\Model;

class RbacPermission extends Model implements RbacPermissionInterface
{
    use RbacPermissionTraits;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table;

    /**
     * Creates a new instance of the model.
     *
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = config('database.prefix').config('rbac.permissions_table');
    }
}
