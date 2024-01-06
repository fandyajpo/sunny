<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('barang')->insert([
            'name' => 'Test Barang',
            'description' => 'Test Barang',
            'description' => 'Test Barang',
            'price' => 9999,
            'category' => 'TEST CATEGORY',
            'supplier' => 'TEST SUPPLIER',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
