<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserProductionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superadmin = User::create([
            'email' => 'superadmin@mailinator.com',
            'password' => Hash::make('#Pass123'),
            'name' => 'Superadmin Smartplant Care',
            'email_verified_at' => Carbon::now(),
        ]);

        $role = Role::findByName('SUPER_ADMIN', 'api');
        $superadmin->assignRole($role);

        $staff = User::create([
            'email' => 'staff@mailinator.com',
            'password' => Hash::make('#Pass123'),
            'name' => 'Staff Smartplant Care',
            'email_verified_at' => Carbon::now(),
        ]);

        $role = Role::findByName('STAFF', 'api');
        $staff->assignRole($role);
    }
}
