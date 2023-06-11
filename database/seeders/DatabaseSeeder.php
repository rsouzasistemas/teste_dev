<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Helpers\Helper;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::unprepared(file_get_contents('app/__ExtraTables/states.sql'));
        $this->command->info('States table seeded!');

        DB::unprepared(file_get_contents('app/__ExtraTables/cities.sql'));
        $this->command->info('Cities table seeded!');

        \App\Models\User::factory()->create([
            'state_id' => 24,
            'city_id' => 173,
            'name' => 'Usuário 1',
            'email' => 'test@example.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'gender' => 'M',
            'cpf' => Helper::gerador_cpf(0),
            'birth' => fake()->date(),
            'address' => fake()->streetAddress()
        ]);

        \App\Models\User::factory(100)->create();
    }
}
