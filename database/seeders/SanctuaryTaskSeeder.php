<?php

namespace Database\Seeders;

use App\Models\Caretaker;
use App\Models\Sanctuary;
use App\Models\SanctuaryTask;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SanctuaryTaskSeeder extends Seeder
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
                    SanctuaryTask::create([
                        "datetime"=>date('Y-m-d H:i:s'),
                        "summary"=>"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?",
                        "sanctuary_id"=>$sanctuary->id,
                        "caretaker_id"=>$caretaker->id,
                    ]);
                }
            }
        }
    }
}
