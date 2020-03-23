<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoPedidosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_pedidos')->insert([
            ['nome' => 'Horas Extras'],
            ['nome' => 'Dano Moral'],
            ['nome' => 'Dano Material'],
            ['nome' => 'Outros']
        ]);
    }
}
