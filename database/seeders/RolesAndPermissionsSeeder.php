<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
      app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
      
      // create permissions
      //permission roles
Permission::create(['name' => 'role-edit']);
Permission::create(['name' => 'role-delete']);
Permission::create(['name' => 'role-list']);
Permission::create(['name' => 'role-create']);
      
      //permission manage user 
Permission::create(['name' => 'user-edit']);
Permission::create(['name' => 'user-delete']);
Permission::create(['name' => 'user-list']);
Permission::create(['name' => 'user-create']);
Permission::create(['name'=>'user-import']);
Permission::create(['name' =>'user-print']);
Permission::create(['name'=>'user-export']);

      //permission product 
Permission::create(['name' => 'product-print']);
Permission::create(['name' => 'product-import']);
Permission::create(['name' => 'product-export']);
Permission::create(['name' => 'product-edit']);
Permission::create(['name' => 'product-delete']);
Permission::create(['name' => 'product-list']);
Permission::create(['name' => 'product-create']);
       
        // create roles and assign created permissions
        
        
        Role::create([
            'name' => 'admin',
            'guard_name' => 'web'
        ]);

        Role::create([
            'name' => 'user',
            'guard_name' => 'web'
        ]);
        
        Role::create([
            'name' => 'visitor',
            'guard_name' => 'web'
        ]);
      

        // or may be done by chaining
    

        $role = Role::create(['name' => 'super-admin',
          'guard_name' => 'web'
        ]);
        $role->givePermissionTo(Permission::all());
    }
}
