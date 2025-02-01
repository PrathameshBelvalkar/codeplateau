<?php

namespace Database\Seeders;

use App\Models\CertificateData;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CertificateDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CertificateData::factory()->count(100)->create();
    }
}
