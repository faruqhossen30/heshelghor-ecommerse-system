<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Auth\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'name' => 'Super Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt(123)
        ]);
        Admin::create([
            'name' => 'Super2 Admin',
            'email' => 'admin2@gmail.com',
            'password' => bcrypt(123)
        ]);
        Admin::create([
            'name' => 'Super3 Admin',
            'email' => 'admin3@gmail.com',
            'password' => bcrypt(123)
        ]);
    }
}
