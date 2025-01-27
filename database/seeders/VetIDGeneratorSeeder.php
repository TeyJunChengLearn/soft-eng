<?php

namespace Database\Seeders;

use App\Models\MedicalStaff;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class VetIDGeneratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $medicalStaffs=MedicalStaff::where('status','=',true)->get();
        $i=1;
        foreach ($medicalStaffs as $medicalStaff) {
            $medicalStaff->update([
                'vet_id'=>''.$i,
            ]);
            $i++;
        }
    }
}
