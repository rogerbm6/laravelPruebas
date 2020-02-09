<?php

use Illuminate\Database\Seeder;
use App\Models\Entrada;

class EntradasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Entrada::class)->times(7)->create();
    }
}
