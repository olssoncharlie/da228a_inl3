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
                "name" => "Taco-lover 84",
                "comment" => "ÄLSKAR TACO, FANTASTISK KRYDDA!!",
                "herb_id" => 4,
            ],
            [
                "name" => "Göran",
                "comment" => "Inget fan av stark mat",
                "herb_id" => 3,
            ],
            [
                "name" => "Leonardo",
                "comment" => "Bravissimo",
                "herb_id" => 1,
            ],
        ]);
    }
}
