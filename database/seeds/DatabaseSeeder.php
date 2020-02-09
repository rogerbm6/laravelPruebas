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
      $this->truncateTables([
        'users',
        'entradas',
        'profiles'
      ]);
      $this->call(UsersTableSeeder::class);
      $this->call(EntradasTableSeeder::class);
      $this->call(ProfilesTableSeeder::class);
    }

    //Borra toda la BBDD
    public function truncateTables(array $tables)
    {
      foreach ($tables as $table) {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table($table)->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

      }
    }
}
