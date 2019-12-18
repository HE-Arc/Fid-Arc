<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\User;

class GetFidelityCards extends TestCase
{

    public function testGetFidelityCards()
    {
        $user = User::where('email', 'client@test.com')->first();
        $this->actingAs($user, 'api')
            ->withHeaders(['Accept' => 'Application/json'])
            ->json('GET', 'api/fidelityCards')
            ->assertStatus(200)
            ->assertJsonStructure([
                "data" => [
                    '*' => [
                        "company_name",
                        "message_to_user",
                        "total_number_of_points",
                        "current_number_of_points",
                        "card_color_id"
                    ]
                ]
            ]);
    }
}
