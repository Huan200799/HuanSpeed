<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name_user' => "Huân Admin",
                'email'=>"nguyendinhhuan200799@gmail.com",
                'password'=>bcrypt('12345678'),
                'address' => 'Quảng Nam',
                'phone' => '0776230169',
                'level'=> 'Admin',
                'avatar' => 'chiem-nguong-chiec-kawasaki-ninja-zx-10r.jpg',
            ],
        ];
        DB::table('users')->insert($data);
    }
}
