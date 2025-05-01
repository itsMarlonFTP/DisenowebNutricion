<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Ticket;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tickets = [
            [
                'user_email' => 'mdanielcarvallo@gmail.com',
                'title' => 'Solicitud de receta vegana',
                'description' => 'Necesito una receta vegana alta en proteínas para mi dieta. Preferiblemente que incluya legumbres y sea fácil de preparar.',
                'status' => 'pending'
            ],
            [
                'user_email' => 'mdanielcarvallo@gmail.com',
                'title' => 'Receta sin gluten para desayuno',
                'description' => 'Busco opciones de desayuno sin gluten que sean nutritivas y deliciosas. Me gustaría incluir frutas y semillas.',
                'status' => 'in_progress'
            ],
            [
                'user_email' => 'mdanielcarvallo@gmail.com',
                'title' => 'Plato bajo en carbohidratos',
                'description' => 'Necesito una receta baja en carbohidratos que sea rica en proteínas y grasas saludables. Ideal para la cena.',
                'status' => 'completed'
            ],
            [
                'user_email' => 'mdanielcarvallo@gmail.com',
                'title' => 'Snack saludable para el trabajo',
                'description' => 'Busco ideas para snacks saludables que pueda llevar al trabajo. Deben ser fáciles de preparar y transportar.',
                'status' => 'pending'
            ],
            [
                'user_email' => 'mdanielcarvallo@gmail.com',
                'title' => 'Receta para aumentar masa muscular',
                'description' => 'Necesito una receta alta en calorías y proteínas para ayudarme a ganar masa muscular. Preferiblemente que incluya pollo o pescado.',
                'status' => 'in_progress'
            ]
        ];

        foreach ($tickets as $ticket) {
            Ticket::create($ticket);
        }
    }
}
