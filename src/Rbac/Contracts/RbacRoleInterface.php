<?php
namespace Jackchow\Rbac\Contracts;

Interface RbacRoleInterface
{
    /*
     * 和权限表的一个多对多关系
     * */
    public function perms();


}
