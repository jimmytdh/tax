<?php

use Illuminate\Database\Seeder;

class salary_grade_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $code = 0;
        for($i=1; $i<=33; $i++){
            for($x=1; $x<=8; $x++){
                if($x==1){
                    $code = $i;
                }else{
                    $code = "$i-$x";
                }

                DB::table('salary_grade_tables')
                    ->insert([
                        'code' => $code,
                        'year' => 2020,
                        'salary' => 0
                    ]);
            }
        }
    }
}
