<?php

use App\DoctorSpecialization;
use Illuminate\Database\Seeder;

class DoctorSpecializationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DoctorSpecialization::truncate();

        DoctorSpecialization::create(['name' => 'Pediatra']);
        DoctorSpecialization::create(['name' => 'Dermatolog']);
        DoctorSpecialization::create(['name' => 'Alergolog']);
        DoctorSpecialization::create(['name' => 'Urolog']);
        DoctorSpecialization::create(['name' => 'Kardiolog']);
        DoctorSpecialization::create(['name' => 'Okulista']);
        DoctorSpecialization::create(['name' => 'Dentysta']);
        DoctorSpecialization::create(['name' => 'Ginekolog']);
        DoctorSpecialization::create(['name' => 'Seksuolog']);
    }
}
