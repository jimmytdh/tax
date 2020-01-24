<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('tdh')
            ->table('users')->insert([
                'fname' => 'Jimmy',
                'lname' => 'Parker',
                'username' => 'admin',
                'password' => bcrypt('admin123')
            ]);

        DB::connection('tdh')
            ->table('systems')->insert([
                'user_id' => 1,
                'sys_code' => 'tax',
                'level' => 'admin'
            ]);
    }
}
