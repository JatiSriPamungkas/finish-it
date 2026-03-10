<?php
namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name'     => 'admin',
        //     'email'    => 'admin@gmail.com',
        //     'password' => 'admin123',
        //     'role_id'  => 1,
        // ]);

        $this->call([
            TaskStatusSeeder::class,
            PrioritySeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            ProjectSeeder::class,
            TaskSeeder::class,
            ProjectMemberSeeder::class,
        ]);
    }
}
