# Rbac (ThinkPHP 5 Package)

Rbac是向ThinkPHP 5添加基于角色的权限的简洁而灵活的方式。


## Contents
- [安装](#安装)
- [配置](#配置)
    - [用户与角色的关系](#用户与角色的关系)
    - [模型](#模型)
        - [Role](#role)
        - [Permission](#permission)
        - [Admin](#admin)
- [使用](#使用)
    - [概念](#概念)
        - [检查用户是否拥有权限](#检查用户是否拥有权限)
        
- [故障排除](#故障排除)
- [License](#license)
- [Contribution guidelines](#contribution-guidelines)


## 安装

运行 `composer require jackchow/rbac`

项目用到TP的migrate扩展包。（Tip：命令运行失败请检查该包是否安装）[点击了解](https://www.kancloud.cn/manual/thinkphp5_1/354133)




## 配置
您还可以发布此包的配置以进一步自定义表名称和模型名称空间。
在application/command.php文件中添加下面代码（生成命令）:
```bash
return [
    'Jackchow\Rbac\Command\PublishCommand',
    'Jackchow\Rbac\Command\MigrateCommand',
];
```
然后使用`php think rbac:publish` 生成配置文件`rbac.php` 在config目录下。

在 `config/rbac.php` 文件中设置属性值.
委托使用这些值来引用正确的用户表和模型.

### 用户与角色的关系

刚刚在上面注册了Rbac的生成命令后，现在就可以使用命令生成Rbac的迁移文件:

```bash
php think rbac:migrate
```

它将生成`<timestamp>_rbac.php` 迁移文件 和 `RbacSeeder.php`数据填充文件.


生成迁移文件位置在：\database\migrations  中
  
  
现在您可以根据自己的需求修改迁移文件


如果你修改了迁移文件中某些表的字段 记得也要在seed文件中修改对应的数值，不然seed填充可能会出现无法预测的错误。

然后您现在可以使用think migrate 和 think seed 命令运行它：



```bash
php think migrate:run
php think seed:run
```

迁移后，将出现五个新表格:
- `admins` &mdash; 保存用户表记录 
- `roles` &mdash; 保存角色表记录
- `permissions` &mdash; 保存权限表记录
- `role_user` &mdash; 保存用户和角色之间的 [多对多](https://www.kancloud.cn/manual/thinkphp5_1/354060) 关系 
- `permission_role` &mdash; 保存权限和角色之间的 [多对多](https://www.kancloud.cn/manual/thinkphp5_1/354060) 关系 

如果系统已经存在admins表 可以在生成的迁移文件注释相应的迁移代码。

小提示一下：如果你已经执行了迁移命令，又想修改迁移文件。可以使用命令`think migrate:rollback`回滚一下

如果你还没有创建admin模块 可以使用命令`php think build --module admin`生成


hhh,相信你已经懂了.

### 模型

#### Role

使用以下示例在`application\admin\model\Roles.php`内创建角色模型：

```php
<?php
namespace app\admin\model;

use Jackchow\Rbac\RbacRole;

class Roles extends RbacRole
{

}
```

角色模型有三个主要属性:
- `name` &mdash; 角色的唯一名称，用于在应用程序层查找角色信息。 例如：“管理员”，“所有者”，“员工”.
- `description` &mdash; 该角色的人类可读名称。 不一定是唯一的和可选的。 例如：“用户管理员”，“项目所有者”，“Widget Co.员工”.

 `description` 字段是可选的; 他的字段在数据库中是可空的。

#### Permission

使用以下示例在`application\admin\model\Permissions.php`内创建角色模型：

```php
<?php

namespace app\admin\model;

use Jackchow\Rbac\RbacPermission;

class Permissions extends RbacPermission
{
}
```

“权限”模型与“角色”具有相同的两个属性：
- `name` &mdash; 权限的唯一名称，用于在应用程序层查找权限信息。一般保存的是路由.
- `description` &mdash; 该权限的描述。 例如：“创建文章”，“查看文件”，“文件管理”等权限.

 `description` 字段是可选的; 他的字段在数据库中是可空的。


#### Admin

接下来，在现有的Admin模型中使用`RbacUserTrait`特征。 例如：

```php
<?php

namespace app\admin\model;

use think\Model;
use Jackchow\Rbac\Traits\RbacUser;

class Admins extends Model
{
    use RbacUser;

    protected $hidden=['password','created_at','updated_at'];

}
```

这将启用与Role的关系，并在User模型中添加以下方法roles（）和 can（$ permission）


不要忘记转储composer的自动加载

```bash
composer dump-autoload
```

**准备好了.**

## 使用

### 概念
让我们从创建以下`角色`和`权限`开始：

```php
$owner = new Roles();
$owner->name         = 'owner';
$owner->description  = '网站所有者'; // 可选
$owner->created_at   = date('Y-m-d H:i:s');
$owner->updated_at   = date('Y-m-d H:i:s');
$owner->save();

$administrator = new Roles();
$administrator->name        = 'administrator';
$administrator->description = '管理员'; // 可选
$administrator->created_at  = date('Y-m-d H:i:s');
$administrator->updated_at  = date('Y-m-d H:i:s');
$administrator->save();
```

接下来，让我们为刚刚创建的两个角色将它们分配给用户。
这很容易：

```php
$hurray = Admins::where('name', 'hurray')->find();

// 为用户分配角色

$hurray->attachRole($administrator->id);

//等效于 $admin->roles()->attach($administrator->id);
```

现在我们只需要为这些角色添加权限：

```php
$administrator = Roles::where('name', 'administrator')->find();

$owner = Roles::where('name', 'owner')->find();

$createPost = new Permissions();
$createPost->name         = 'post/create';
// 允许administrator...
$createPost->description  = '创建一篇文章'; // 可选
$createPost->created_at   = date('Y-m-d H:i:s');
$createPost->updated_at   = date('Y-m-d H:i:s');
$createPost->save();

$editPost = new Permissions();
$editPost->name         = 'post/edit';
// 允许owner...
$editPost->description  = '编辑一篇文章'; // optional
$editPost->created_at   = date('Y-m-d H:i:s');
$editPost->updated_at   = date('Y-m-d H:i:s');
$editPost->save();

$administrator->attachPermission($createPost->id);
//等效于  $admin->perms()->sync(array($createPost->id));

$owner->attachPermissions(array($createPost->id, $editPost->id));
//等效于  $owner->perms()->sync(array($createPost->id, $editPost->id));
```

#### 检查用户是否拥有权限

现在我们可以通过执行以下操作来检查角色和权限：

```php
$hurray = Admins::where('name', 'hurray')->find();
$hurray->can('post/edit');   // false
$hurray->can('post/create'); // true
```

小提示：本功能在保存用户和角色之间的关系和角色与权限之间的关系，为了避免大量的sql查询是使用了tp的缓存的哦，

如果你更新了他们之间的关系，记得把缓存清理一下。它们的缓存键名分别是 `rbac_roles_for_user_用户表主键值（参考值：1）` 和 `rbac_permissions_for_role_角色表主键值（参考值：1）`

到目前为止，已经可以很大的满足到后台用户权限管理功能了。

本功能目前比较简单，现在作者正在扩展其他功能.

最后，如果你觉得不错，请start一个吧 你的鼓励是我创作的无限动力.

## 故障排查

如果你迁移和配置中遇到问题，可直接联企鹅号:775893055



## License

Rbac is free software distributed under the terms of the MIT license.

## Contribution guidelines

Support follows PSR-1 and PSR-4 PHP coding standards, and semantic versioning.

Please report any issue you find in the issues page.  
Pull requests are welcome.
