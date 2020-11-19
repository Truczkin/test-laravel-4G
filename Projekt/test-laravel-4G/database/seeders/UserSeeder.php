<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::updateOrCreate([
            'name' => 'admin',
            'email' => 'admin@localhost',
        ], [
            'password' => Hash::make('admin'),
            'email_verified_at' => Carbon::now(),
        ]);
        $admin->assignRoles(['admin', 'editor']);
    
        User::updateOrCreate([
            'name' => 'user',
            'email' => 'user@localhost',
        ], [
            'password' => Hash::make('user'),
            'email_verified_at' => Carbon::now(),
        ]);
    }
}
