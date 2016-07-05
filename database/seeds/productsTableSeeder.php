<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\product;
class productsTableSeeder extends Seeder
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
				'nombre'=>'Zapato crv',
				'codbarra'=>'1234567890123',
				'cant'=>'35',
				'pre_com'=>25.50,
				'pre_ven'=>35.99,
				'img'=>'https://http2.mlstatic.com/zapatos-converse-de-nins-talla-us-1-eur-32-195-cms-S_21393-MEC20208477180_122014-F.jpg',
				'category_id'=>1,
				'brand_id'=>1,
				'isactive_id'=>1,
				'created_at' => new DateTime,
            		'updated_at' => new DateTime
			]
        	);
        product::insert($data);
    }
}
