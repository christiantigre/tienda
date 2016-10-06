<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class logride extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'log:ride';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Verifica si existe un archivo autorizado y genera ride';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        \Log::info('Esto es una prueba de log');
    }
}
