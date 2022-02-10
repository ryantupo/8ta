<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $path = (glob(database_path('/seeds/users/users.sql')));
        $sql = file_get_contents($path);
        // DB::unprepared($sql);
        DB::connection('users')->unprepared($sql);

        dd($path);
        echo($path);


        // foreach (glob(database_path() . '/seeds/users/*.sql') as $filename) {
        //     $sql = file_get_contents($filename);
        //     DB::connection('users')->unprepared($sql);
        // }
    }
}
