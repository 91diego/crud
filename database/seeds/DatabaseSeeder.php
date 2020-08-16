<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Creamos los datos de prueba
        factory(App\User::class, 5)->create();
        factory(App\Task::class, 30)->create();
    }
}
