<?php

use Illuminate\Database\Seeder;

class TiposSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipos')->insert(['categoria_id'=>'1','subcategoria_id'=>'1','nome'=>'Padrão']);
        DB::table('tipos')->insert(['categoria_id'=>'1','subcategoria_id'=>'1','nome'=>'Cobertura']);
        DB::table('tipos')->insert(['categoria_id'=>'1','subcategoria_id'=>'1','nome'=>'Duplex/Triplex']);
        DB::table('tipos')->insert(['categoria_id'=>'1','subcategoria_id'=>'1','nome'=>'Kitnet']);
        DB::table('tipos')->insert(['categoria_id'=>'1','subcategoria_id'=>'1','nome'=>'Loft']);

        DB::table('tipos')->insert(['categoria_id'=>'1','subcategoria_id'=>'2','nome'=>'Padrão']);
        DB::table('tipos')->insert(['categoria_id'=>'1','subcategoria_id'=>'2','nome'=>'Vila']);
        DB::table('tipos')->insert(['categoria_id'=>'1','subcategoria_id'=>'2','nome'=>'Condomínio']);

        DB::table('tipos')->insert(['categoria_id'=>'1','subcategoria_id'=>'3','nome'=>'Loja/Sala']);
        DB::table('tipos')->insert(['categoria_id'=>'1','subcategoria_id'=>'3','nome'=>'Loja/Centro Comercial']);
        DB::table('tipos')->insert(['categoria_id'=>'1','subcategoria_id'=>'3','nome'=>'Garagem']);
        DB::table('tipos')->insert(['categoria_id'=>'1','subcategoria_id'=>'3','nome'=>'Galpão/Depósito/Armazém']);
        DB::table('tipos')->insert(['categoria_id'=>'1','subcategoria_id'=>'3','nome'=>'Loja/Sala']);

        DB::table('tipos')->insert(['categoria_id'=>'1','subcategoria_id'=>'4','nome'=>'Chácara']);
        DB::table('tipos')->insert(['categoria_id'=>'1','subcategoria_id'=>'4','nome'=>'Fazenda']);
        DB::table('tipos')->insert(['categoria_id'=>'1','subcategoria_id'=>'4','nome'=>'Sítio']);

        DB::table('tipos')->insert(['categoria_id'=>'1','subcategoria_id'=>'5','nome'=>'Padrão']);
        DB::table('tipos')->insert(['categoria_id'=>'1','subcategoria_id'=>'5','nome'=>'Loteamento/Condomínio']);
    }
}
