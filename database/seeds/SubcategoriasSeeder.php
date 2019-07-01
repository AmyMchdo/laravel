<?php

use Illuminate\Database\Seeder;

class SubcategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subcategorias')->insert(['categoria_id'=>'1','nome'=>'Apartamento']);
        DB::table('subcategorias')->insert(['categoria_id'=>'1','nome'=>'Casa']);
        DB::table('subcategorias')->insert(['categoria_id'=>'1','nome'=>'Comercial']);
        DB::table('subcategorias')->insert(['categoria_id'=>'1','nome'=>'Rural']);
		DB::table('subcategorias')->insert(['categoria_id'=>'1','nome'=>'Terreno']);	


    }
}
