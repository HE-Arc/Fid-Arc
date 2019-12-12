<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

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
