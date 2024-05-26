<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        \App\Models\User::factory()->create([
            'name' => 'admin',
            'username' => 'admin',
            'password' => Hash::make('12345678'),
            'is_admin' => 1
        ]);

        \App\Models\Product::factory()->create([
            'code' => '076950450479',
            'name' => 'sunco 2L',
            'price' => 30000,
            'unit' => 'pcs',
            'stock' => 20,
            'image' => null
        ]);
        \App\Models\Product::factory()->create([
            'code' => '780198601838',
            'name' => 'sasa tepung bumbu',
            'price' => 12000,
            'unit' => 'pcs',
            'stock' => 20,
            'image' => null
        ]);
        \App\Models\Product::factory()->create([
            'code' => '9780198601838',
            'name' => 'kitacho',
            'price' => 20000,
            'unit' => 'pcs',
            'stock' => 20,
            'image' => null
        ]);

    }
}
