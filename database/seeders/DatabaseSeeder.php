<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory()->create(
            ['name' => 'isoft',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345')
            ]
        );

        //creamos la carpeta para almacenrlas imagenes        
        Storage::deleteDirectory('public/empresas');
        Storage::makeDirectory('public/empresas');

        \App\Models\Empresa::factory(40)->create();
        \App\Models\MetodoPago::factory(45)->create();
    }
}
