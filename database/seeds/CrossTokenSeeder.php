<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CrossTokenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cross_tokens')->truncate();
        DB::table('cross_tokens')->insert(
            [
                ['system'=>'Current','token'=> hash('sha256', 'Inspection')],
                ['system'=>'FireInspection','token'=> hash('sha256', 'FireInspection')],
            ]);
    }
}
