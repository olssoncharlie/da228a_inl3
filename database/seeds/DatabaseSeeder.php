<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(HerbsTableSeed::class);
        $this->call(StoresTableSeed::class);
        $this->call(UsersTableSeed::class);
        $this->call(ReviewsTableSeed::class);
        $this->call(HerbStoreTableSeed::class);
    }
}
