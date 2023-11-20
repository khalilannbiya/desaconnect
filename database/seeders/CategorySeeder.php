<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'category' => 'Agama',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'category' => 'Ekonomi dan Keuangan',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'category' => 'Kesehatan',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'category' => 'Sosial Inklusif',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'category' => 'Ketentraman',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'category' => 'Pembangunan Desa',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'category' => 'Pendidikan',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'category' => 'Pertanian',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'category' => 'Peternakan',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'category' => 'Teknologi Informasi',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'category' => 'Politik dan Hukum',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'category' => 'Kekerasan',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'category' => 'Obat Terlarang',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'category' => 'Sumber Daya Alam',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'category' => 'Topik Khusus',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'category' => 'Topik Lainnya',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
