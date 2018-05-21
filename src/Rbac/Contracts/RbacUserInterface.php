<?php
namespace Jackchow\Rbac\Contracts;

Interface RbacUserInterface
{
    /*
     * 和权限表的一个多对多关系
     * */
    public function perms();

    /*
     * 和角色表的一个多对多关系
     * */
    public function roles();

}
