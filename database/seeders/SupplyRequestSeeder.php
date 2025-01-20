<?php

namespace Database\Seeders;

use App\Models\Caretaker;
use App\Models\Sanctuary;
use App\Models\SupplyRequest;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SupplyRequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sanctuaryTaskCount=6;
        $caretakers=Caretaker::where("status","=", true)->get();
        foreach($caretakers as $caretaker){
            $Sanctuaries = Sanctuary::where("manager_id","=",$caretaker->manager_id)->get();
            foreach($Sanctuaries as $sanctuary){
                for($i=0;$i<$sanctuaryTaskCount;$i++){
                    SupplyRequest::create([
                        "item_name"=>"Cat food",
                        "quantity"=>1234,
                        "datetime"=>date('Y-m-d H:i:s'),
                        "sanctuary_id"=>$sanctuary->id,
                        "caretaker_id"=>$caretaker->id,
                    ]);
                }
            }
        }
    }
}
