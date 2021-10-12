<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create Roles
        $roleSuperAdmin = Role::create(['name' => 'superadmin']);


        // Permission List as array
        $permissions = [
            [
                'group_name' => 'profile',
                'permissions' => [
                    'profile.view',
                    'profile.edit',
                    'password.change',
                ]
            ],
            [
                'group_name' => 'admin',
                'permissions' => [
                    'admin.create',
                    'admin.view',
                    'admin.edit',
                    'admin.delete',
                    'admin.change.status',
                ]
            ],
            [
                'group_name' => 'product',
                'permissions' => [
                    'product.create',
                    'product.view',
                    'product.edit',
                    'product.delete',
                    'product.change.status',
                ]
            ],
            [
                'group_name' => 'merchant',
                'permissions' => [
                    'merchant.create',
                    'merchant.view',
                    'merchant.edit',
                    'merchant.delete',
                    'merchant.change.status',
                ]
            ],
            [
                'group_name' => 'delivery man',
                'permissions' => [
                    'deliveryman.create',
                    'deliveryman.view',
                    'deliveryman.edit',
                    'deliveryman.delete',
                    'deliveryman.change.status',
                ]
            ],
            [
                'group_name' => 'roles',
                'permissions' => [
                    'role.create',
                    'role.view',
                    'role.edit',
                    'role.delete',
                    'role.change.status',
                ]
            ],
            [
                'group_name' => 'users',
                'permissions' => [
                    'user.create',
                    'user.view',
                    'user.edit',
                    'user.delete',
                    'user.change.status',
                ]
            ],
        ];


        // Create and Assign Permissions
        for ($i = 0; $i < count($permissions); $i++) {
            $permissionGroup = $permissions[$i]['group_name'];
            for ($j = 0; $j < count($permissions[$i]['permissions']); $j++) {
                // Create Permission
                $permission = Permission::create(['name' => $permissions[$i]['permissions'][$j], 'group_name' => $permissionGroup]);
                $roleSuperAdmin->givePermissionTo($permission);
                $permission->assignRole($roleSuperAdmin);
            }
        }
    }
}
