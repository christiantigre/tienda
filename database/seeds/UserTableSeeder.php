<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
        	[
        	'name'=>'Christian',
        	'last_name'=>'Tigre',
        	'email'=>'amdrestigre17@gmail.com',
        	'user'=>'Christian',
        	'password'=>\Hash::make('12345'),
            'isactive'=>'0',
            'fnacimiento'=>'17-12-1991'
        	'created_at'=>new DateTime,
        	'updated_at'=>new DateTime,
            'positions_id'=>'1'
        	],
        	[
        	'name'=>'Axel',
        	'last_name'=>'Tigre',
        	'email'=>'axel@gmail.com',
        	'user'=>'axel',
        	'password'=>\Hash::make('123456789'),
        	'isactive'=>'1',
            'fnacimiento'=>'17-12-1995',
        	'created_at'=>new DateTime,
        	'updated_at'=>new DateTime,
            'positions_id'=>'1'
        	],
        	);
        User::insert($data);
    }
}
