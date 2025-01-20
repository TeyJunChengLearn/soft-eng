<?php

namespace Database\Seeders;

use App\Models\Sanctuary;
use App\Models\MedicalStaff;
use App\Models\CatHealthRecord;
use App\Models\CatMedicalCareRecord;
use App\Models\CatTreatmentRecord;
use Illuminate\Database\Seeder;
use App\Models\MedicalStaffVerification;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CatMedicalRecordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $catHealthRecordCount = 2;
        $catMedicalCareRecordsCount = 1;
        $catTreatmentRecordsCount =1;
        $medicalStaffs = MedicalStaff::where("status","=",true)->get();
        $i=0;
        $j=0;
        $k=0;
        foreach($medicalStaffs as $medicalStaff) {
            $verifications = MedicalStaffVerification::where("medical_staff_id",$medicalStaff->id)->where("approval",'=',"true")->get();
            foreach($verifications as $verification) {
                $sanctuaries = Sanctuary::where('manager_id',"=",$verification->manager_id)->get();
                foreach($sanctuaries as $sanctuary) {
                    foreach($sanctuary->cat as $cat) {
                        if($i<$catHealthRecordCount){
                            $catHealthRecord=CatHealthRecord::create([
                                "medical_staff_id"=>$medicalStaff->id,
                                "cat_id"=>$cat->id,
                                "datetime"=>date('Y-m-d H:i:s'),
                                "summary"=>"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?",
                            ]);
                            $i++;
                            while($j<$catMedicalCareRecordsCount){
                                CatMedicalCareRecord::create([
                                    "cat_health_record_id"=>$catHealthRecord->id,
                                    'medicine_name'=>"alprazolam",
                                    "arrangement"=>"Take half when needed",
                                ]);
                                $j++;
                            }
                            while($k<$catTreatmentRecordsCount){
                                CatTreatmentRecord::create([
                                    "cat_health_record_id"=>$catHealthRecord->id,
                                    'summary'=>"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?",
                                ]);
                                $k++;
                            }
                        }else{
                            $i=0;
                            $j=0;
                            $k=0;
                            break;
                        }

                    }

                }
            }
        }
    }
}
