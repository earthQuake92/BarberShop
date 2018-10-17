<?php

use App\Admin;
use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        

        $faker = \Faker\Factory::create();

        // And now, let's create a few articles in our database:
        for ($i = 0; $i < 5; $i++) {
            Admin::create([
                'Nome' => "Peppino".$i,
                'Cognome' => "Di Capri".$i,
                'Partita_IVA' => "ABSNAP".$i,
                'Cellulare' => 3292403737
            ]);
        }
    }
}
