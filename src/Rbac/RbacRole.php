<?php
namespace Jackchow\Rbac;

use Jackchow\Rbac\Contracts\RbacRoleInterface;
use Jackchow\Rbac\Traits\RbacRole as RbacRoleTraits;
use think\Model;

class RbacRole extends Model implements RbacRoleInterface
{
    use RbacRoleTraits;

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
        $this->table = config('database.prefix').config('rbac.roles_table');
    }

}
