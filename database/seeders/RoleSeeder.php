<?php
namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['role' => 'administrator']);
        Role::create(['role' => 'manager']);
        Role::create(['role' => 'developer']);
    }
}
