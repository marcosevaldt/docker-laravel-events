<?php

use Illuminate\Database\Seeder;
use App\Event;
use App\EventStatus;

class EventTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
			
			$ativo   = EventStatus::where('name', '=', 'Ativo')->first();
    	
    	$event   = new Event;
      $event->insert([
      	'name' 				=> 'Grande Desfile de Natal',
      	'address' 		=> 'Expogramado',
      	'description' => ' Uma história de aventura encantadora, com muita fantasia e tradições de Natal.',
      	'value' 			=> '150',
      	'status_id' 	=> $ativo->id,
      	'date'				=> '2018-11-29 23:30:30'
      ]);

      $inativo = EventStatus::where('name', '=', 'Inativo')->first();
      
      $event   = new Event;
      $event->insert([
      	'name' 				=> 'Natal pelo Mundo',
      	'address' 		=> 'Expogramado',
      	'description' => 'Uma apresentação empolgante, com muita música natalina, acrobatas e bailarinos.',
      	'value' 			=> '180',
      	'status_id' 	=> $inativo->id,
      	'date'				=> '2018-11-29 18:30:00'
      ]);

    }
}
