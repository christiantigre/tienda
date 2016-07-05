<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Geocoder\Geocoder;

class MapController extends Controller
{
    public function index(){
    	try {
    $geocode = Geocoder::geocode('10 rue Gambetta, Paris, France');
    // The GoogleMapsProvider will return a result
    var_dump($geocode);
} catch (\Exception $e) {
    // No exception will be thrown here
    echo $e->getMessage();
}
    }
}
