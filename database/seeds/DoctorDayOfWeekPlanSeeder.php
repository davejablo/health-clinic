<?php

use App\DoctorDayOfWeekPlan;
use Illuminate\Database\Seeder;

class DoctorDayOfWeekPlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DoctorDayOfWeekPlan::truncate();

        DoctorDayOfWeekPlan::create(['doctor_profile_id' => '1', 'day_of_week' => '1', 'from_hour' => '08:00:00', 'to_hour' => '16:00:00']);
        DoctorDayOfWeekPlan::create(['doctor_profile_id' => '1', 'day_of_week' => '2', 'from_hour' => '08:30:00', 'to_hour' => '15:30:00']);
        DoctorDayOfWeekPlan::create(['doctor_profile_id' => '1', 'day_of_week' => '3', 'from_hour' => '09:30:00', 'to_hour' => '14:30:00']);
        DoctorDayOfWeekPlan::create(['doctor_profile_id' => '1', 'day_of_week' => '4', 'from_hour' => '07:00:00', 'to_hour' => '15:00:00']);
        DoctorDayOfWeekPlan::create(['doctor_profile_id' => '1', 'day_of_week' => '5', 'from_hour' => '10:00:00', 'to_hour' => '17:00:00']);

        DoctorDayOfWeekPlan::create(['doctor_profile_id' => '2', 'day_of_week' => '1', 'from_hour' => '07:00:00', 'to_hour' => '15:00:00']);
        DoctorDayOfWeekPlan::create(['doctor_profile_id' => '2', 'day_of_week' => '2', 'from_hour' => '08:30:00', 'to_hour' => '15:30:00']);
        DoctorDayOfWeekPlan::create(['doctor_profile_id' => '2', 'day_of_week' => '4', 'from_hour' => '09:00:00', 'to_hour' => '16:00:00']);
        DoctorDayOfWeekPlan::create(['doctor_profile_id' => '2', 'day_of_week' => '5', 'from_hour' => '11:00:00', 'to_hour' => '13:30:00']);

        DoctorDayOfWeekPlan::create(['doctor_profile_id' => '3', 'day_of_week' => '1', 'from_hour' => '08:00:00', 'to_hour' => '16:00:00']);
        DoctorDayOfWeekPlan::create(['doctor_profile_id' => '3', 'day_of_week' => '2', 'from_hour' => '08:30:00', 'to_hour' => '15:30:00']);
        DoctorDayOfWeekPlan::create(['doctor_profile_id' => '3', 'day_of_week' => '3', 'from_hour' => '09:30:00', 'to_hour' => '14:30:00']);
        DoctorDayOfWeekPlan::create(['doctor_profile_id' => '3', 'day_of_week' => '4', 'from_hour' => '07:00:00', 'to_hour' => '15:00:00']);
        DoctorDayOfWeekPlan::create(['doctor_profile_id' => '3', 'day_of_week' => '5', 'from_hour' => '10:00:00', 'to_hour' => '17:00:00']);

        DoctorDayOfWeekPlan::create(['doctor_profile_id' => '4', 'day_of_week' => '1', 'from_hour' => '08:00:00', 'to_hour' => '16:00:00']);
        DoctorDayOfWeekPlan::create(['doctor_profile_id' => '4', 'day_of_week' => '2', 'from_hour' => '08:00:00', 'to_hour' => '16:00:00']);
        DoctorDayOfWeekPlan::create(['doctor_profile_id' => '4', 'day_of_week' => '3', 'from_hour' => '08:00:00', 'to_hour' => '16:00:00']);
        DoctorDayOfWeekPlan::create(['doctor_profile_id' => '4', 'day_of_week' => '4', 'from_hour' => '08:00:00', 'to_hour' => '16:00:00']);
        DoctorDayOfWeekPlan::create(['doctor_profile_id' => '4', 'day_of_week' => '5', 'from_hour' => '08:00:00', 'to_hour' => '16:00:00']);

        DoctorDayOfWeekPlan::create(['doctor_profile_id' => '5', 'day_of_week' => '1', 'from_hour' => '08:00:00', 'to_hour' => '16:00:00']);
        DoctorDayOfWeekPlan::create(['doctor_profile_id' => '5', 'day_of_week' => '3', 'from_hour' => '09:30:00', 'to_hour' => '14:30:00']);
        DoctorDayOfWeekPlan::create(['doctor_profile_id' => '5', 'day_of_week' => '5', 'from_hour' => '10:00:00', 'to_hour' => '17:00:00']);
    }
}
