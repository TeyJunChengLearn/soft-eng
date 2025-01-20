<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Admin;
use App\Models\Manager;
use App\Models\Caretaker;
use App\Models\MedicalStaff;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserAndRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $randomUserCount = 300;
        // $users =collect();

        // for($i=0;$i<$randomUserCount;$i++){
        //     $users->push(
        //         User::create([
        //             'username'=>"User".($i+1),
        //             'email'=>"User".($i+1)."@example.com",
        //             'password'=>bcrypt('12345678'),
        //         ])
        //     );
        // }

        // foreach($users as $user){
        //     $roles =[
        //         'admin'=>Admin::Create(['user_id'=>$user->id,'status'=>false]),
        //         'manager'=>Manager::Create(['user_id'=>$user->id,'status'=>false]),
        //         'medical_staff'=>MedicalStaff::Create(['user_id'=>$user->id,'status'=>false]),
        //         'caretaker'=>Caretaker::Create(['user_id'=>$user->id,'status'=>false]),
        //     ];

        //     $randomKey = array_rand($roles);
        //     $roles[$randomKey]->update(['status'=>true]);
        // }

        $adminCount = 5;
        $managerCount = 10;
        $medicalStaffCount = 20;
        $caretakerCount = 600;

        for($i=0;$i<$adminCount;$i++){
            $user=User::create([
                'username'=>"User".($i+1),
                'email'=>"User".($i+1)."@example.com",
                'password'=>bcrypt('12345678'),
            ]);
            Admin::Create(['user_id'=>$user->id,'status'=>true]);
            Manager::Create(['user_id'=>$user->id,'status'=>false]);
            MedicalStaff::Create(['user_id'=>$user->id,'status'=>false]);
            Caretaker::Create(['user_id'=>$user->id,'status'=>false]);
        }

        for($i=$adminCount;$i<($adminCount+$managerCount);$i++){
            $user=User::create([
                'username'=>"User".($i+1),
                'email'=>"User".($i+1)."@example.com",
                'password'=>bcrypt('12345678'),
            ]);
            Admin::Create(['user_id'=>$user->id,'status'=>false]);
            Manager::Create(['user_id'=>$user->id,'status'=>true]);
            MedicalStaff::Create(['user_id'=>$user->id,'status'=>false]);
            Caretaker::Create(['user_id'=>$user->id,'status'=>false]);
        }

        for($i=($adminCount+$managerCount);$i<($adminCount+$managerCount+$medicalStaffCount);$i++){
            $user=User::create([
                'username'=>"User".($i+1),
                'email'=>"User".($i+1)."@example.com",
                'password'=>bcrypt('12345678'),
            ]);
            Admin::Create(['user_id'=>$user->id,'status'=>false]);
            Manager::Create(['user_id'=>$user->id,'status'=>false]);
            MedicalStaff::Create(['user_id'=>$user->id,'status'=>true]);
            Caretaker::Create(['user_id'=>$user->id,'status'=>false]);
        }

        for($i=($adminCount+$managerCount+$medicalStaffCount);$i<($adminCount+$managerCount+$medicalStaffCount+$caretakerCount);$i++){
            $user=User::create([
                'username'=>"User".($i+1),
                'email'=>"User".($i+1)."@example.com",
                'password'=>bcrypt('12345678'),
            ]);
            Admin::Create(['user_id'=>$user->id,'status'=>false]);
            Manager::Create(['user_id'=>$user->id,'status'=>false]);
            MedicalStaff::Create(['user_id'=>$user->id,'status'=>false]);
            Caretaker::Create(['user_id'=>$user->id,'status'=>true]);
        }
    }
}
