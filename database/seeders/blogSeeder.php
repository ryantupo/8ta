<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class blogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (glob(database_path() . '\seeds\blogs\*.sql') as $filename) {
            $sql = file_get_contents($filename);
            DB::connection(`8ta.posts`)->unprepared($sql);
        }
    }
}