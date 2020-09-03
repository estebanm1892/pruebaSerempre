<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Illuminate\Database\Eloquent\Model;

use App\City;

use App\Client;

use App\User;

class importData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import-data:db';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import data and migrations';

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
     * @return int
     */
    public function handle()
    {
        // Ejecución de migraciones
        $this->call('migrate');        

        $this->info('Migraciones creadas');
        
        // Inserción de datos a las migraciones ciudades
        
        $this->info('Insertando datos de ciudades');

        $this->output->progressStart(5);

        $data1 = array(
            array('name'=>'Tunja'),
            array('name'=>'Sogamoso'),
            array('name'=>'Bogota'),
            array('name'=>'Medellin'),
            array('name'=>'Cali')
            
        );
        
        $this->output->progressAdvance();

        City::insert($data1); // Eloquent approach       

        $this->output->progressFinish();

        $this->info('Datos de ciudades insertados');

        // Inserción de datos a las migraciones clientes
        
        $this->info('Insertando datos de clientes');

        $this->output->progressStart(3);

        $data2 = array(
            array('name'=>'John Snow', 'city_id' => 2),
            array('name'=>'Draenerys Targaryen', 'city_id' => 3),
            array('name'=>'Tyrion Lannister', 'city_id' => 4),            
        );
        
        $this->output->progressAdvance();

        Client::insert($data2); // Eloquent approach       

        $this->output->progressFinish();

        $this->info('Datos de clientes insertados');

        // Inserción de datos a las migraciones usuarios
        
        $this->info('Insertando datos de usuarios');

        $this->output->progressStart(3);

        $data3 = array(
            array('name'=>'Esteban Monroy', 'email' => 'estebanm1892@gmail.com', 'password' => bcrypt(12345)),
            array('name'=>'Yenkary Peralta', 'email' => 'luyen@gmail.com', 'password' => bcrypt(12345)),
            array('name'=>'Serrato', 'email' => 'serrato@gmail.com', 'password' => bcrypt(12345)),
        );
        
        $this->output->progressAdvance();

        User::insert($data3); // Eloquent approach       

        $this->output->progressFinish();

        $this->info('Datos de usuarios insertados');


    }
}
