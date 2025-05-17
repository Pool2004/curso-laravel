<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Illuminate\Support\Facades\Log;

use App\Models\User;

class MostrarSaludo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:mostrar-saludo';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Mostrar un saludo en la consola
        $this->info('Hola, soy un comando de consola');
        Log::info('Hola, soy un comando de consola');

        // Rescatar usuarios de la base de datos y que me los muestre
        /*
        $users = User::all();
        $this->info('Usuarios:');
        foreach ($users as $user) {
            $this->info($user->name);
        }
        // Guardar en el log
        Log::info('Usuarios:');
        */
    }
}
