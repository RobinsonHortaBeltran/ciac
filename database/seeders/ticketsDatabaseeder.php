<?php

namespace Database\Seeders;

use App\Models\Tickets;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ticketsDatabaseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tickets::create([
            'name'       => 'ticket 1',
            'id_creator' => '1',
            'id_type'    => '1',
            'status'     => 'abierto'
        ]);
    }
}
