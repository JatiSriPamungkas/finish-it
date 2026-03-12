<?php
namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->count(50)->create();
        User::factory()->create([
            'name'     => 'admin',
            'email'    => 'admin@gmail.com',
            'password' => 'admin123',
            'role_id'  => 1,
        ]);
        User::factory()->create([
            'name'     => 'manager',
            'email'    => 'manager@gmail.com',
            'password' => 'manager123',
            'role_id'  => 2,
        ]);
        User::factory()->create([
            'name'     => 'developer',
            'email'    => 'developer@gmail.com',
            'password' => 'developer123',
            'role_id'  => 3,
        ]);
    }
}
