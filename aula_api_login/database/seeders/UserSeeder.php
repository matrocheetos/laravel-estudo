<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!User::where('email', 'cesar@celke.com.br')->first()) {
            $superAdmin = User::create([
                'name' => 'Cesar',
                'email' => 'cesar@celke.com.br',
                'password' => Hash::make('123456a', ['rounds' => 12])
            ]);
        }
        
        if (!User::where('email', 'kelly@celke.com.br')->first()) {
            $admin = User::create([
                'name' => 'Kelly',
                'email' => 'kelly@celke.com.br',
                'password' => Hash::make('123456a', ['rounds' => 12])
            ]);
        }
        
        if (!User::where('email', 'jessica@celke.com.br')->first()) {
            $teacher = User::create([
                'name' => 'Jessica',
                'email' => 'jessica@celke.com.br',
                'password' => Hash::make('123456a', ['rounds' => 12])
            ]);
        }
        
        if (!User::where('email', 'gabrielly@celke.com.br')->first()) {
            $tutor = User::create([
                'name' => 'Gabrielly',
                'email' => 'gabrielly@celke.com.br',
                'password' => Hash::make('123456a', ['rounds' => 12])
            ]);
        }
        
        if (!User::where('email', 'marcos@celke.com.br')->first()) {
            $student = User::create([
                'name' => 'Marcos',
                'email' => 'marcos@celke.com.br',
                'password' => Hash::make('123456a', ['rounds' => 12])
            ]);
        }

        if (!User::where('email', 'mateus@m.com')->first()) {
            $student = User::create([
                'name' => 'Mateus',
                'email' => 'mateus@m.com',
                'password' => Hash::make('1234567', ['rounds' => 12])
            ]);
        }
    }
}
