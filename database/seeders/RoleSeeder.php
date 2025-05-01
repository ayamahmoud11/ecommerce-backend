<?php

// database/seeders/RoleSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role; // تأكد من استخدام النموذج الصحيح

class RoleSeeder extends Seeder {
    public function run() {
        Role::firstOrCreate([
            'name' => 'admin',
            'guard_name' => 'web' 
        ]);
        
        Role::firstOrCreate([
            'name' => 'customer',
            'guard_name' => 'web'
        ]);
    }
}
// }
// <?php

// namespace Database\Seeders;

// use Illuminate\Database\Seeder;
// use Spatie\Permission\Models\Role;

// class RoleSeeder extends Seeder
// {
//     public function run()
//     {
//         Role::firstOrCreate(['name' => 'admin']);
//         Role::firstOrCreate(['name' => 'customer']);
//     }
// }
 
