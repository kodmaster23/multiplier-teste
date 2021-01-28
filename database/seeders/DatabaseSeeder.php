<?php

namespace Database\Seeders;

use App\Domains\Users\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'thiago',
            'email' => 'thigo@kodmaster.com.br',
            'password' => Hash::make('1'),
        ]);

        DB::table('users')->insert([
            'name' => 'rodrigo',
            'email' => 'rodrigo@multiplier.com.br',
            'password' => Hash::make('1'),
        ]);

        DB::table('users')->insert([
            'name' => 'renan',
            'email' => 'renan@multiplier.com.br',
            'password' => Hash::make('1'),
        ]);
    }
}
