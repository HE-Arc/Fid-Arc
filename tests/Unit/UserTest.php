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
        $this->assertDatabaseHas('users', [
            'email' => 'company@test.com',
        ]);
    }
}
