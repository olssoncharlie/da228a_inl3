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
                "product_id" => 4,
            ],
            [
                "name" => "Göran",
                "comment" => "Inget fan av stark mat",
                "product_id" => 3,
            ],
            [
                "name" => "Leonardo",
                "comment" => "Bravissimo",
                "product_id" => 1,
            ],
        ]);
    }
}
