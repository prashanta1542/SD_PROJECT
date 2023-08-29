<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employees')->insert([
            'name' => 'Anik Sen',
            'role' => 'Super Admin',
            'email' => 'aniksen12@gmail.com',
            'address'=>'31 no jamalkhan road',
            'contact'=>'01800000000',
            'otp'=>'123456',
            'pass'=>md5(123),
            'department'=>'null',
            'verified'=>true,
            'status'=>true
          
        ]);
    }
}
