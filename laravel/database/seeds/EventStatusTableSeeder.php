<?php

use Illuminate\Database\Seeder;
use App\EventStatus;

class EventStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$status = new EventStatus;
      $status->insert([
      	'name' 				=> 'Ativo',
      	'description' => 'Evento ativo e disponível para compra'
      ]);

      $status = new EventStatus;
      $status->insert([
      	'name' 				=> 'Inativo',
      	'description' => 'Evento inativo e indisponível para compra'
      ]);
    }
}
