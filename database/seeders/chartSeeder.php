<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class chartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        {
            foreach (glob(database_path() . '/seeds/charts/*.sql') as $filename) {
                $sql = file_get_contents($filename);
                DB::connection('users')->unprepared($sql);
            }
        }
    }
}
