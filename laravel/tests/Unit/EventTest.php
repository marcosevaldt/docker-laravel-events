<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Event;
use App\User;

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
    $this->get(route('event.show', $event->id))->assertSuccessful();
  }

  public function test_can_list_events()
  {
  	$this->withoutMiddleware();
   	$this->get(route('home'))
   	  ->assertSuccessful()
   	  ->assertViewHas('events');
  }

  public function test_can_buy_event()
  {
    $event = factory(Event::class)->create();
    $this->withoutMiddleware();
    $this->post(route('checkout.index'), [
      'id' => $event->id
    ])->assertSuccessful();
  }

  public function test_user_can_see_event_form()
  {
    $user = factory(User::class)->make();
    $this->actingAs($user)
    ->get(route('home'))
      ->assertSuccessful()
      ->assertViewIs('home');
  }

  public function test_user_can_see_event_list_form()
  {
    $user = factory(User::class)->make();
    $this->actingAs($user)
      ->get(route('home'))
      ->assertSuccessful()
      ->assertViewIs('home');
  }

  public function test_user_can_see_event_show_form()
  {
    $event = factory(Event::class)->create();
    $user = factory(User::class)->make();
    $this->actingAs($user)
      ->get(route('event.show', ['id' => $event->id]))
      ->assertSuccessful()
      ->assertViewIs('event.show');
  }

  public function test_user_can_see_checkout_form()
  {
    $event = factory(Event::class)->create();
    $user = factory(User::class)->make();
    $this->actingAs($user)
      ->post(route('checkout.index'), [
      'id' => $event->id
    ])
      ->assertSuccessful()
      ->assertViewIs('checkout.index');
  }
}
