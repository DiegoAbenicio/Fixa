<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServicesTableSeeder extends Seeder
{
    /**
     * php artisan db:seed --class=ServicesTableSeeder
     * Comando para rodar o Seeder
     * @return void
     */
    public function run()
    {
        DB::table('services')->insert([
            ['name' => 'Eletricista'],
            ['name' => 'Pintor'],
            ['name' => 'Pedreiro'],
            ['name' => 'Faxineiro'],
            ['name' => 'Servente'],
            ['name' => 'Carpinteiro'],
            ['name' => 'Encanador'],
            ['name' => 'Designer de interiores'],
            ['name' => 'Técnico TI'],
            ['name' => 'Jardineiro'],
            ['name' => 'Limpador de Piscina'],
            ['name' => 'Cozinheiro'],
            ['name' => 'Adestrador'],
            // adicione mais linhas aqui se desejar
        ]);
    }
}
