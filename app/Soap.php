<?php

namespace App;

use Artisaninweb\SoapWrapper\Extension\SoapService;
use Illuminate\Database\Eloquent\Model;

class Soap extends SoapService
{
    /**
     * @var string
     */
    protected $name = 'currency';

    /**
     * @var string
     */
    protected $wsdl = 'http://currencyconverter.kowabunga.net/converter.asmx?WSDL';

    /**
     * @var boolean
     */
    protected $trace = true;

    /**
     * Get all the available functions
     *
     * @return mixed
     */
    public function functions()
    {
        return $this->getFunctions();
    }
}
