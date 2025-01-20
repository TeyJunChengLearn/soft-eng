<?php

namespace Database\Seeders;

use App\Models\Manager;
use App\Models\MedicalStaff;
use Illuminate\Database\Seeder;
use App\Models\MedicalStaffVerification;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MedicalStaffVerificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $verificationCount = 5;
        $medicalStaffs = MedicalStaff::where("status","=",true)->get();


        foreach($medicalStaffs as $medicalStaff){
            $managers = Manager::where("status","=",true)->inRandomOrder()->get();
            $i=0;
            foreach($managers as $manager){
                if($i < $verificationCount){
                    MedicalStaffVerification::create([
                        "approval" =>true,
                        "manager_id" => $manager->id,
                        "medical_staff_id" => $medicalStaff->id,
                    ]);
                    $i++;
                }else{
                    MedicalStaffVerification::create([
                        "approval" =>false,
                        "manager_id" => $manager->id,
                        "medical_staff_id" => $medicalStaff->id,
                    ]);
                }
            }
        }
    }
}
