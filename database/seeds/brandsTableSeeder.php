<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\brand;
class brandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array
        	(
				[
					'brand' => 'Converse',
            		'created_at' => new DateTime,
            		'updated_at' => new DateTime
				],
				[
					'brand' => 'Adidas',
            		'created_at' => new DateTime,
            		'updated_at' => new DateTime
				],
				[
					'brand' => 'Nike',
            		'created_at' => new DateTime,
            		'updated_at' => new DateTime
				],
				[
					'brand' => 'Vans',
            		'created_at' => new DateTime,
            		'updated_at' => new DateTime
				],
				[
					'brand' => 'Timberland',
            		'created_at' => new DateTime,
            		'updated_at' => new DateTime
				],
				[
					'brand' => 'Levis',
            		'created_at' => new DateTime,
            		'updated_at' => new DateTime
				]
        	);
        	brand::insert($data);
    }
}
