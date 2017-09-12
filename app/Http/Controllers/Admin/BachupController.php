<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Foundation\Bus\DispatchesJobs;

class BachupController extends Controller
{
	public function index()
	{
		$job = Artisan::call('backup:database');

		/*$job = Artisan::queue('backup:database', [
			'--queue' => 'backup'
			]);*/
		//Artisan::call('backup:database');
			//$job = new index()->onQueue('backup:database');

			
		}
	}
