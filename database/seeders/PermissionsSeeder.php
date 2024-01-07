<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superAdminPermissionAPI = [
            'api.user.store',
            'api.user.update',
            'api.user.destroy',
            'api.user.show',
            'api.user.index',
            'api.user.profile',
            'api.user.profile.update',
            'api.user.change.password',
            'api.user.forgot.password',
            'api.plant-category.store',
            'api.plant-category.update',
            'api.plant-category.destroy',
            'api.plant.store',
            'api.plant.update',
            'api.plant.destroy',
            'api.sensor.store',
            'api.sensor.update',
            'api.sensor.update.batch',
            'api.sensor.destroy',
        ];

        $staffPermissionAPI = [
            'api.user.store',
            'api.user.update',
            'api.user.destroy',
            'api.user.show',
            'api.user.index',
            'api.user.profile',
            'api.user.profile.update',
            'api.user.change.password',
            'api.user.forgot.password',
            'api.plant-category.store',
            'api.plant-category.update',
            'api.plant-category.destroy',
            'api.plant.store',
            'api.plant.update',
            'api.plant.destroy',
            'api.sensor.store',
            'api.sensor.update',
            'api.sensor.update.batch',
            'api.sensor.destroy',
        ];

        $normalUserPermissionAPI = [
            'api.user.profile',
            'api.user.profile.update',
            'api.user.change.password',
            'api.user.forgot.password',
        ];

        Permission::create(['name' => 'api.user.store', 'guard_name' => 'api']);
        Permission::create(['name' => 'api.user.update', 'guard_name' => 'api']);
        Permission::create(['name' => 'api.user.destroy', 'guard_name' => 'api']);
        Permission::create(['name' => 'api.user.show', 'guard_name' => 'api']);
        Permission::create(['name' => 'api.user.index', 'guard_name' => 'api']);
        Permission::create(['name' => 'api.user.profile', 'guard_name' => 'api']);
        Permission::create(['name' => 'api.user.profile.update', 'guard_name' => 'api']);
        Permission::create(['name' => 'api.user.change.password', 'guard_name' => 'api']);
        Permission::create(['name' => 'api.user.forgot.password', 'guard_name' => 'api']);
        Permission::create(['name' => 'api.user.reset.password', 'guard_name' => 'api']);
        Permission::create(['name' => 'api.plant-category.store', 'guard_name' => 'api']);
        Permission::create(['name' => 'api.plant-category.update', 'guard_name' => 'api']);
        Permission::create(['name' => 'api.plant-category.destroy', 'guard_name' => 'api']);
        Permission::create(['name' => 'api.plant.store', 'guard_name' => 'api']);
        Permission::create(['name' => 'api.plant.update', 'guard_name' => 'api']);
        Permission::create(['name' => 'api.plant.destroy', 'guard_name' => 'api']);
        Permission::create(['name' => 'api.sensor.store', 'guard_name' => 'api']);
        Permission::create(['name' => 'api.sensor.update', 'guard_name' => 'api']);
        Permission::create(['name' => 'api.sensor.update.batch', 'guard_name' => 'api']);
        Permission::create(['name' => 'api.sensor.destroy', 'guard_name' => 'api']);

        Role::findByName('NORMAL_USER', 'api')->syncPermissions($normalUserPermissionAPI);

        Role::findByName('STAFF', 'api')->syncPermissions($staffPermissionAPI);

        Role::findByName('SUPER_ADMIN', 'api')->syncPermissions($superAdminPermissionAPI);
    }
}
