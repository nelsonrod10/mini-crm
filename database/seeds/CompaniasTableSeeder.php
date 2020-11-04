<?php

use App\Compania;
use App\Empleado;
use Illuminate\Database\Seeder;

class CompaniasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Compania::class, 2)->create()->each(function($compania){
            factory(Empleado::class,rand(3,15))->create([
                'compania_id' => $compania->id
            ]);
        });
    }
}
