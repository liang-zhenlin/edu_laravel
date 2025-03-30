<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ManagerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // use the factory to create a Faker\Generator instance
        $faker = \Faker\Factory::create('zh_CN');
        $data = [];
        for($i = 0; $i < 100; $i++) {
            $data[] = [
                'username'      => $faker -> userName,
                'password'      => bcrypt('123456'),
                'gender'        => rand(1, 3),
                'mobile'        => $faker -> phoneNumber,
                'email'         => $faker -> email,
                'role_id'       => rand(1, 6),
                'created_at'    => date('Y-m-d H:i:s', time()),
                'status'        => rand(1, 2)
            ];
        }
        DB::table('manager') -> insert($data);
    }
}
