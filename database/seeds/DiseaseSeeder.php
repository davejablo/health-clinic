<?php

use App\Disease;
use Illuminate\Database\Seeder;

class DiseaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Disease::truncate();

        Disease::create(['name' => 'Grypa', 'description' => 'Choroba bardzo śmiertelna']);
        Disease::create(['name' => 'Cholera', 'description' => 'Przykra choroba']);
        Disease::create(['name' => 'Dżuma', 'description' => 'Niezwykle rzadka i bolesna choroba']);
        Disease::create(['name' => 'Przeziębienie', 'description' => 'Niezwykle popularna na zwolnieniach L4']);
        Disease::create(['name' => 'Zapalenie płuc', 'description' => 'Wycieńczająca choroba, ale można przeżyć']);
        Disease::create(['name' => 'Katar', 'description' => 'Najlepiej poczekać 7 dni']);
        Disease::create(['name' => 'Kaszel', 'description' => 'Nikt nie lubi tej choroby']);
        Disease::create(['name' => 'Róża', 'description' => 'Nieprzyjemna, ale co zrobić.']);
        Disease::create(['name' => 'Ospa', 'description' => 'No swędzi bardzo, lepiej nie drapać.']);
    }
}
