<?php

use App\DoctorSpecialization;
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
        $this->call(RolesTableSeeder::class);
        $this->call(DoctorSpecializationSeeder::class);
        $this->call(DoctorsSeeder::class);
        $this->call(PatientSeeder::class);
        $this->call(DiseaseSeeder::class);
        $this->call(MedicineSeeder::class);
        $this->call(DoctorDayOfWeekPlanSeeder::class);

        // $this->call(UsersTableSeeder::class);
        //        php artisan db:seed
//        php artisan make:seeder UsersTableSeeder
    }
}
