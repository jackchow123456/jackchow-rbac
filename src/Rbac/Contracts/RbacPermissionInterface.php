<?php
namespace Jackchow\Rbac\Contracts;

Interface RbacPermissionInterface
{
    /*
     * 和角色表的一个多对多关系
     * */
    public function roles();
}
