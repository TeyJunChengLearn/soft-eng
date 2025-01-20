<?php

namespace Database\Seeders;

use App\Models\Cat;
use App\Models\Sanctuary;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $catCount = 30;
        $sanctuaries = Sanctuary::all();
        foreach ($sanctuaries as $index => $sanctuary) {
            for($i=0;$i<$catCount;$i++){
                Cat::create([
                    'name'=>"cat ".(($index*$catCount)+$i+1),
                    "gender"=>($i%2==0)?true:false,
                    "breed"=>"Ragdoll",
                    "birthdate"=>date('Y-m-d'),
                    "general_story"=>   "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?",
                    "sanctuary_id"=>$sanctuary->id,
                ]);
            }
        }
    }
}
