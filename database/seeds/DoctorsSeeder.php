<?php

use App\DoctorProfile;
use App\Role;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DoctorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $doctorRole = Role::where('name', 'ROLE_DOCTOR')->firstOrFail();

        User::truncate();
        $user1 = User::create([
            'name' => 'Doctor 1',
            'email' => 'doctor1@gmail.com',
            'password' => bcrypt('klinika123')
        ]);
        $user1->roles()->attach($doctorRole->id);

        DoctorProfile::truncate();
        DoctorProfile::create([
            'user_id' => $user1->id,
            'name' => 'doctor1@gmail.com',
            'surname' => 'doctor1_surname',
            'birthDate' => '1989-02-08',
            'phone' => '102837',
            'locality' => 'Warszawa',
            'gender' => rand(0, 2),
            'specialization_id' => rand(1, 9)
        ]);

        $user2 = User::create([
            'name' => 'Doctor 2',
            'email' => 'doctor2@gmail.com',
            'password' => bcrypt('klinika123')
        ]);
        $user2->roles()->attach($doctorRole->id);

        DoctorProfile::create([
            'user_id' => $user2->id,
            'name' => 'doctor2@gmail.com',
            'surname' => 'doctor2_surname',
            'birthDate' => '1988-04-28',
            'phone' => '0328745',
            'locality' => 'Katowice',
            'gender' => rand(0, 2),
            'specialization_id' => rand(1, 9)
        ]);

        $user3 = User::create([
            'name' => 'Doctor 3',
            'email' => 'doctor3@gmail.com',
            'password' => bcrypt('klinika123')
        ]);
        $user3->roles()->attach($doctorRole->id);

        DoctorProfile::create([
            'user_id' => $user3->id,
            'name' => 'doctor3@gmail.com',
            'surname' => 'doctor3_surname',
            'birthDate' => '1990-07-26',
            'phone' => '129348',
            'locality' => 'Częstochowa',
            'gender' => rand(0, 2),
            'specialization_id' => rand(1, 9)
        ]);

        $user4 = User::create([
            'name' => 'Doctor 4',
            'email' => 'doctor4@gmail.com',
            'password' => bcrypt('klinika123')
        ]);
        $user4->roles()->attach($doctorRole->id);

        DoctorProfile::create([
            'user_id' => $user4->id,
            'name' => 'doctor4@gmail.com',
            'surname' => 'doctor4_surname',
            'birthDate' => '1991-09-16',
            'phone' => '12394',
            'locality' => 'Toruń',
            'gender' => rand(0, 2),
            'specialization_id' => rand(1, 9)
        ]);

        $user5 = User::create([
            'name' => 'Doctor 5',
            'email' => 'doctor5@gmail.com',
            'password' => bcrypt('klinika123')
        ]);
        $user5->roles()->attach($doctorRole->id);

        DoctorProfile::create([
            'user_id' => $user5->id,
            'name' => 'doctor5@gmail.com',
            'surname' => 'doctor5_surname',
            'birthDate' => '1987-10-6',
            'phone' => '12345',
            'locality' => 'Częstochowa',
            'gender' => rand(0, 2),
            'specialization_id' => rand(1, 9)
        ]);

        $user6 = User::create([
            'name' => 'Doctor 6',
            'email' => 'doctor6@gmail.com',
            'password' => bcrypt('klinika123')
        ]);
        $user6->roles()->attach($doctorRole->id);

        DoctorProfile::create([
            'user_id' => $user6->id,
            'name' => 'doctor6@gmail.com',
            'surname' => 'doctor6_surname',
            'birthDate' => '1993-5-11',
            'phone' => '10293',
            'locality' => 'Częstochowa',
            'gender' => rand(0, 2),
            'specialization_id' => rand(1, 9)
        ]);

        $user7 = User::create([
            'name' => 'Doctor 7',
            'email' => 'doctor7@gmail.com',
            'password' => bcrypt('klinika123')
        ]);
        $user7->roles()->attach($doctorRole->id);

        DoctorProfile::create([
            'user_id' => $user7->id,
            'name' => 'doctor7@gmail.com',
            'surname' => 'doctor7_surname',
            'birthDate' => '1991-09-16',
            'phone' => '732930',
            'locality' => 'Częstochowa',
            'gender' => rand(0, 2),
            'specialization_id' => rand(1, 9)
        ]);
    }
}
