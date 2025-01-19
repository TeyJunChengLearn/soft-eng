<?php

namespace Database\Seeders;

use App\Models\Manager;
use App\Models\Caretaker;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AssignCaretakerWithManagerIDSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $managers = Manager::where('status', true)->inRandomOrder()->get();
        $caretakers = Caretaker::where('status', true)->inRandomOrder()->get();

        if ($managers->isEmpty()) {
            $this->command->info('No active managers found. Skipping assignment.');
            return;
        }

        // Shuffle managers and caretakers
        $managers = $managers->shuffle();
        $caretakers = $caretakers->shuffle();

        // Assign each caretaker to a manager
        $managerCount = $managers->count();
        foreach ($caretakers as $index => $caretaker) {
            // Use modulo to cycle through managers if there are more caretakers than managers
            $manager = $managers[$index % $managerCount];
            $caretaker->manager_id = $manager->id;
            $caretaker->save();
        }

        $this->command->info('Caretakers successfully assigned to managers.');
    }
}
