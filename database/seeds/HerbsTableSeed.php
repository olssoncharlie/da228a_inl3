<?php

use Illuminate\Database\Seeder;

class HerbsTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('herbs')->insert([
            [
                "name" => "Basilika",
                "price" => 30,
                "amount" => 10,
                "image" => "https://www.kryddtorget.se/wordpress/wp-content/uploads/2014/03/basilika.jpg",
                "description" => 'En god krydda. Populär i det italienska och thailändska köket. Flyktig och bör därför tillsättas sent i matlagningen.',
            ],
            [
                "name" => "Svartpeppar, hel",
                "price" => 45,
                "amount" => 30,
                "image" => "https://www.kryddtorget.se/wordpress/wp-content/uploads/2014/03/pepparsvarthel.jpg",
                "description" => "En av världens mest populära krydda. Ursprungligen från Indien. Fungerar till det mesta. ",
            ],
            [
                "name" => "Rökt paprikapulver",
                "price" => 100,
                "amount" => 50,
                "image" => "https://www.kryddtorget.se/wordpress/wp-content/uploads/2016/01/IMG_7872.jpg",
                "description" => "Aromatisk och rökig smak. Kan användas som smak samt färgsättare på rätter. Populär i bland annat korv eller gulasch grytor.",
            ],
            [
                "name" => "Taco krydda",
                "price" => 10,
                "amount" => 300,
                "image" => "https://www.kryddtorget.se/wordpress/wp-content/uploads/2014/03/IMG_7012-e1429910233954.jpg",
                "description" => "Självförklarande. Används till Taco och Tex-mex rätter. GOTT!"
            ]
        ]);
    }
}
