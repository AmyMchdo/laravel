<?php

use Illuminate\Database\Seeder;

class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categorias')->insert(['nome'=>'Imóveis']);
        DB::table('categorias')->insert(['nome'=>'Veículos']);
        DB::table('categorias')->insert(['nome'=>'Agro']);
    }
}
