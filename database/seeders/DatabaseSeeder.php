<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(UserAndRoleSeeder::class);
        $this->call(AssignCaretakerWithManagerIDSeeder::class);
        $this->call(SanctuarySeeder::class);
        $this->call(CatSeeder::class);
        $this->call(AdminActivityHistorySeeder::class);
        $this->call(AdoptionSeeder::class);
        $this->call(MedicalStaffVerificationSeeder::class);
        $this->call(AppointmentSeeder::class);
        $this->call(CatMedicalRecordSeeder::class);
        $this->call(CatActivitySeeder::class);
        $this->call(SanctuaryTaskSeeder::class);
        $this->call(SupplyRequestSeeder::class);
        $this->call(FeedbackSeeder::class);
    }
}
