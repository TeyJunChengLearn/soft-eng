<?php

namespace Database\Seeders;

use App\Models\Manager;
use App\Models\Sanctuary;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SanctuarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $managers = Manager::where("status","=",true)->get();
        $sanctuaryPerManagerCount = 30;
        foreach( $managers as $index => $manager ) {
            for($i=0;$i<$sanctuaryPerManagerCount;$i++){
                Sanctuary::create([
                    'name'=>"Sanctuary ".(($index*$sanctuaryPerManagerCount)+$i+1),
                    'address'=>"123 Main Street, Kuala Lumpur, Malaysia",
                    'manager_id'=>$manager->id,
                ]);
            }
        }
    }
}
