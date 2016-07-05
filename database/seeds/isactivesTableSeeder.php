<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\isactive;
class isactivesTableSeeder extends Seeder
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
				'name'=>'Active',
				'val'=>'1',
            		'created_at' => new DateTime,
            		'updated_at' => new DateTime
			],
			[
				'name'=>'Inactive',
				'val'=>'0',
            		'created_at' => new DateTime,
            		'updated_at' => new DateTime
			]
        	);
        isactive::insert($data);
    }
}
