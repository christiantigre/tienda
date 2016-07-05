<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Category;
class categoriesTableSeeder extends Seeder
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
        		'name'=>'Zapatos',
        		'description'=>'description of shoes',
        		'created_at' => new DateTime,
            	'updated_at' => new DateTime
        	],
        	[
        		'name'=>'pants',
        		'description'=>'description of pants',
        		'created_at' => new DateTime,
            	'updated_at' => new DateTime
        	],
        	[
        		'name'=>'shirt',
        		'description'=>'description of shirt',
        		'created_at' => new DateTime,
            	'updated_at' => new DateTime
        	],
        	[
        		'name'=>'sweater',
        		'description'=>'description of sweater',
        		'created_at' => new DateTime,
            	'updated_at' => new DateTime
        	]
        	);
        Category::insert($data);
    }
}
