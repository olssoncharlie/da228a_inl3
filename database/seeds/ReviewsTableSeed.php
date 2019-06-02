<?php

use Illuminate\Database\Seeder;

class ReviewsTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reviews')->insert([
            [
                "user_id" => 1,
                "comment" => "ÄLSKAR TACO, FANTASTISK KRYDDA!!",
                "herb_id" => 4,
            ],
            [
                "user_id" => 2,
                "comment" => "Inget fan av stark mat",
                "herb_id" => 3,
            ],
            [
                "user_id" => 3,
                "comment" => "Bravissimo",
                "herb_id" => 1,
            ],
        ]);
    }
}
