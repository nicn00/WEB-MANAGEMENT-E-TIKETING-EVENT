<?php
namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Event;
use Laravel\Sanctum\Sanctum;

class PurchaseTicketTest extends TestCase
{
    public function test_user_can_purchase_ticket()
    {
        $user = User::factory()->create();
        $event = Event::factory()->create(['quota' => 100, 'price' => 50000]);

        Sanctum::actingAs($user);

        $response = $this->postJson("/api/events/{$event->id}/purchase", ['quantity' => 2]);

        $response->assertStatus(201);
        $this->assertDatabaseHas('tickets', ['user_id' => $user->id, 'event_id' => $event->id]);
    }
}
