<?php

use Illuminate\Database\Seeder;

class HerbsStoresTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('herb_store')->insert([
            [
                "store_id" => 1,
                "herb_id" => 2
            ],
            [
                "store_id" => 1,
                "herb_id" => 4
            ],
            [
                "store_id" => 2,
                "herb_id" => 1
            ],
            [
                "store_id" => 2,
                "herb_id" => 2
            ],
            [
                "store_id" => 2,
                "herb_id" => 3
            ],
            [
                "store_id" => 3,
                "herb_id" => 1
            ],
            [
                "store_id" => 3,
                "herb_id" => 2
            ],
            [
                "store_id" => 3,
                "herb_id" => 3
            ],
            [
                "store_id" => 3,
                "herb_id" => 4
            ],
        ]);
    }
}
