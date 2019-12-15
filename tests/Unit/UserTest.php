<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\User; // user model

class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testIfEmailIsInDb()
    {
		$user = User::find(4);
		$this->actingAs($user)->get('getCardPoints/3');
        $this->assertDatabaseHas('users', [
            'email' => 'company@test.com',
        ]);
    }
}
