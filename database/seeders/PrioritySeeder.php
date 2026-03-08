<?php
namespace Database\Seeders;

use App\Models\Priority;
use Illuminate\Database\Seeder;

class PrioritySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Priority::create(['name' => 'low']);
        Priority::create(['name' => 'medium']);
        Priority::create(['name' => 'high']);
        Priority::create(['name' => 'urgent']);
    }
}
