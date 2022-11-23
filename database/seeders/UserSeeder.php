<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            ['name'      => 'Admin Digitalife', 
            'role'       => trans('lang.admin_role'),
            'email'      => 'admin@digitalife.com.mx', 
            'password'   => bcrypt('digitalife'),
        ]]);

        User::insert([
            ['name'      => 'Operador Digitalife', 
            'role'       => trans('lang.operator_role'),
            'email'      => 'operador@digitalife.com.mx', 
            'password'   => bcrypt('digitalife'),
        ]]);
    }
}
