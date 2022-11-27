<?php

namespace Database\Seeders;

use App\Models\SupportType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SupportTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SupportType::create(
            [
                'name'   => 'Abierto',
                'status' => '1'
            ],
            [
                'name'   => 'Pendiente',
                'status' => '1'
            ],
            [
                'name'   => 'Cerrardo',
                'status' => '1'
            ],
        );
    }
}
