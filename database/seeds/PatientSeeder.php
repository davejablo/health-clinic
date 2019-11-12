<?php

use App\PatientProfile;
use App\Role;
use App\User;
use Illuminate\Database\Seeder;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $patientRole = Role::where('name', 'ROLE_PATIENT')->firstOrFail();

        $user1 = User::create([
            'name' => 'Patient 1',
            'email' => 'patient1@gmail.com',
            'password' => bcrypt('klinika123')
        ]);
        $user1->roles()->attach($patientRole->id);

        PatientProfile::truncate();
        PatientProfile::create([
            'user_id' => $user1->id,
            'name' => 'patient1@gmail.com',
            'surname' => 'patient1_surname',
            'birthDate' => '1989-01-07',
            'phone' => '8446878',
            'locality' => 'Katowice',
            'gender' => rand(0, 2),
        ]);

        $user2 = User::create([
            'name' => 'Patient 2',
            'email' => 'patient2@gmail.com',
            'password' => bcrypt('klinika123')
        ]);
        $user2->roles()->attach($patientRole->id);

        PatientProfile::create([
            'user_id' => $user2->id,
            'name' => 'patient2@gmail.com',
            'surname' => 'patient2_surname',
            'birthDate' => '1988-04-28',
            'phone' => '0328745',
            'locality' => 'Częstochowa',
            'gender' => rand(0, 2),
        ]);

        $user3 = User::create([
            'name' => 'Patient 3',
            'email' => 'patient3@gmail.com',
            'password' => bcrypt('klinika123')
        ]);
        $user3->roles()->attach($patientRole->id);

        PatientProfile::create([
            'user_id' => $user3->id,
            'name' => 'patient3@gmail.com',
            'surname' => 'patient3_surname',
            'birthDate' => '1990-07-26',
            'phone' => '129348',
            'locality' => 'Częstochowa',
            'gender' => rand(0, 2),
        ]);

        $user4 = User::create([
            'name' => 'Patient 4',
            'email' => 'patient4@gmail.com',
            'password' => bcrypt('klinika123')
        ]);
        $user4->roles()->attach($patientRole->id);

        PatientProfile::create([
            'user_id' => $user4->id,
            'name' => 'patient4@gmail.com',
            'surname' => 'patient4_surname',
            'birthDate' => '1991-09-16',
            'phone' => '12394',
            'locality' => 'Katowice',
            'gender' => rand(0, 2),
        ]);

        $user5 = User::create([
            'name' => 'Patient 5',
            'email' => 'patient5@gmail.com',
            'password' => bcrypt('klinika123')
        ]);
        $user5->roles()->attach($patientRole->id);

        PatientProfile::create([
            'user_id' => $user5->id,
            'name' => 'patient5@gmail.com',
            'surname' => 'patient5_surname',
            'birthDate' => '1987-10-6',
            'phone' => '12345',
            'locality' => 'Częstochowa',
            'gender' => rand(0, 2),
        ]);

        $user6 = User::create([
            'name' => 'Patient 6',
            'email' => 'patient6@gmail.com',
            'password' => bcrypt('klinika123')
        ]);
        $user6->roles()->attach($patientRole->id);

        PatientProfile::create([
            'user_id' => $user6->id,
            'name' => 'patient6@gmail.com',
            'surname' => 'patient6_surname',
            'birthDate' => '1993-5-11',
            'phone' => '10293',
            'locality' => 'Kraków',
            'gender' => rand(0, 2),
        ]);

        $user7 = User::create([
            'name' => 'Patient 7',
            'email' => 'patient7@gmail.com',
            'password' => bcrypt('klinika123')
        ]);
        $user7->roles()->attach($patientRole->id);

        PatientProfile::create([
            'user_id' => $user7->id,
            'name' => 'patient7@gmail.com',
            'surname' => 'patient7_surname',
            'birthDate' => '1991-09-16',
            'phone' => '732930',
            'locality' => 'Częstochowa',
            'gender' => rand(0, 2),
        ]);
    }
}
