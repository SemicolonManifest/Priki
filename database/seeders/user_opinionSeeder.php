<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class user_opinionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_opinion')->insert(
            [
                ['user_id'=>16,'opinion_id'=>17,'comment'=>'ah!','points'=>1],
                ['user_id'=>15,'opinion_id'=>17,'comment'=>'bon','points'=>0],
                ['user_id'=>17,'opinion_id'=>17,'comment'=>'super..','points'=>-1],
            ]
        );
    }
}
