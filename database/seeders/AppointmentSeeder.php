<?php

namespace Database\Seeders;

use App\Models\Sanctuary;
use App\Models\Appointment;
use App\Models\MedicalStaff;
use Illuminate\Database\Seeder;
use App\Models\MedicalStaffVerification;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AppointmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $appointmentCount = 10;
        $medicalStaffs = MedicalStaff::where("status","=",true)->get();
        $i=0;
        foreach($medicalStaffs as $medicalStaff) {
            $verifications = MedicalStaffVerification::where("medical_staff_id",$medicalStaff->id)->where("approval",'=',"true")->get();
            foreach($verifications as $verification) {
                $sanctuaries = Sanctuary::where('manager_id',"=",$verification->manager_id)->get();
                foreach($sanctuaries as $sanctuary) {
                    foreach($sanctuary->cat as $cat) {
                        if($i<$appointmentCount){
                            Appointment::create([
                                "medical_staff_id"=>$medicalStaff->id,
                                "cat_id"=>$cat->id,
                                "datetime"=>date('Y-m-d H:i:s')
                            ]);
                            $i++;
                        }else{
                            $i=0;
                            break;
                        }

                    }

                }
            }
        }
    }
}
