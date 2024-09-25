<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::create(['name' => 'admin']);
        $clientRole = Role::create(['name' => 'cliente']);
        $driverRole = Role::create(['name' => 'conductor']);

        // Crear permisos
        $manageVehiclesPermission = Permission::create(['name' => 'manage_vehicles']);
        $manageDriversPermission = Permission::create(['name' => 'manage_drivers']);
        $manageRoutesPermission = Permission::create(['name' => 'manage_routes']);
        $manageCustomersPermission = Permission::create(['name' => 'manage_customers']);
        $viewAssignedRoutesPermission = Permission::create(['name' => 'view_assigned_routes']);
        $createOrderPermission = Permission::create(['name' => 'create_order']);
        $viewOrderStatusPermission = Permission::create(['name' => 'view_order_status']);

        

        // Asignar permisos a roles
        $adminRole->permissions()->attach([
            $manageVehiclesPermission->id, $manageDriversPermission->id,
            $manageRoutesPermission->id, $manageCustomersPermission->id
        ]);

        $driverRole->permissions()->attach([
            $viewAssignedRoutesPermission->id
        ]);

        $clientRole->permissions()->attach([
            $createOrderPermission->id, $viewOrderStatusPermission->id
        ]);
    }
}
