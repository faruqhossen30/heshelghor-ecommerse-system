<?php

namespace Database\Seeders;

use App\Models\Auth\Marchant;
use Illuminate\Database\Seeder;

class MarchantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Marchant::create([
            'name' => 'Marchant One',
            'email' => 'marchant@gmail.com',
            'password' => bcrypt(123)
        ]);
    }
}
