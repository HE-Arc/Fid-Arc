<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\User;

class RolesTest extends TestCase
{
  public function setUp():void
  {
    parent::setUp();
    $this->seed('TestDatabaseSeeder');//Run seeder
  }

    public function testUserHasRoleClient()
    {
        $this->assertTrue(User::where('email', 'client@test.com')->first()->hasRole('client'));
    }

    public function testUserHasRoleCompany()
    {
      $this->assertTrue(User::where('email', 'company@test.com')->first()->hasRole('company'));
    }
}
