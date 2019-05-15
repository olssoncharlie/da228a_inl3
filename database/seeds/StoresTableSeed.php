<?php

use Illuminate\Database\Seeder;

class StoresTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('stores')->insert([
            [
                "name" => "Bästa tacostället i världen!",
                "address" => "Mexico city",
            ],
            [
                "name" => "Gäddan, matsal",
                "address" => "Citadellsvägen 7",
            ],
            [
                "name" => "Borgeby kryddgård",
                "address" => "Desideriavägen 4",
            ],
        ]);
    }
}
