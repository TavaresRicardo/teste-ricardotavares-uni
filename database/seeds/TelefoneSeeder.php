<?php

use Illuminate\Database\Seeder;

class TelefoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('telefones')->insert(
            ['numero' => '(32)99114-6130', 'principal' => 1,
             'cliente_id' => 1 ]);
        DB::table('telefones')->insert(
            ['numero' => '(32)98846-7048', 'principal' => 0,
             'cliente_id' => 1 ]);
        
        DB::table('telefones')->insert(
            ['numero' => '(32)99114-2222', 'principal' => 0,
             'cliente_id' => 2 ]);
        DB::table('telefones')->insert(
            ['numero' => '(32)98846-2222', 'principal' => 1,
             'cliente_id' => 2 ]);
        
        DB::table('telefones')->insert(
            ['numero' => '(32)99114-3333', 'principal' => 1,
             'cliente_id' => 3 ]);
        DB::table('telefones')->insert(
            ['numero' => '(32)98846-3333', 'principal' => 0,
             'cliente_id' => 3 ]);
                
        DB::table('telefones')->insert(
            ['numero' => '(32)99114-4444', 'principal' => 0,
             'cliente_id' => 4 ]);
        DB::table('telefones')->insert(
            ['numero' => '(32)98846-4444', 'principal' => 1,
             'cliente_id' => 4 ]);
        
        
        DB::table('telefones')->insert(
            ['numero' => '(32)99114-5555', 'principal' => 1,
             'cliente_id' => 5 ]);
        DB::table('telefones')->insert(
            ['numero' => '(32)98846-5555', 'principal' => 0,
             'cliente_id' => 5 ]);
        
        DB::table('telefones')->insert(
            ['numero' => '(32)99114-6666', 'principal' => 0,
             'cliente_id' => 6 ]);
        DB::table('telefones')->insert(
            ['numero' => '(32)98846-6666', 'principal' => 1,
             'cliente_id' => 6]);
    
    }
}
