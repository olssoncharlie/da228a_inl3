<?php

use Illuminate\Database\Seeder;

class UsersTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                "id" => 1,
                "name" => "Göran",
                "email" => "goran@goran.se",
                "password" => bcrypt('qwerty1234'),
            ],
            [
                "id" => 2,
                "name" => "Sven",
                "email" => "sven@sven.se",
                "password" => bcrypt('qwerty1234'),
            ],
            [
                "id" => 3,
                "name" => "Tacolover",
                "email" => "tacolover@gmail.com",
                "password" => bcrypt('qwerty1234'),
            ],
            
        ]);
    }
}
