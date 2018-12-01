<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Event;

class EventTest extends TestCase
{
	public function test_can_create_event()
	{
		$event = factory(Event::class)->create();
		$this->assertDatabaseHas('events', $event->toArray());
	}
  
  public function test_can_show_event() 
  {
  	$this->withoutMiddleware();
    $event = factory(Event::class)->create();
    $this->get(route('event.show', $event->id))->assertStatus(200);
  }

  public function test_can_list_events()
  {
  	$this->withoutMiddleware();
   	$this->get(route('home'))
   	  ->assertStatus(200)
   	  ->assertViewHas('events');
  }
}
