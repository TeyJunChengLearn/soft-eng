<?php

namespace Database\Seeders;

use App\Models\Adoption;
use App\Models\Caretaker;
use App\Models\Sanctuary;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdoptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sanctuaries = Sanctuary::all();
        foreach ($sanctuaries as $sanctuary) {
            foreach($sanctuary->cat as $cat){
                if ($sanctuary->manager) {
                    $caretaker = Caretaker::where('manager_id', $sanctuary->manager->id)
                        ->inRandomOrder()
                        ->first();

                    // Ensure a caretaker is found before creating an adoption
                    if ($caretaker) {
                        Adoption::create([
                            "datetime" => date('Y-m-d H:i:s'),
                            "cat_id" => $cat->id,
                            "caretaker_id" => $caretaker->id,
                        ]);
                    }
                }
            }

        }
    }
}
