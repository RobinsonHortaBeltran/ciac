<?php

namespace Database\Seeders;

use App\Models\TicketDescription;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ticketsDescriptionDatabaseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TicketDescription::create([
            'description' => 'Es un ticket de pruebas',
            'id_creator'  => '1',
            'ticket_id'   => '1'
        ]);
    }
}
