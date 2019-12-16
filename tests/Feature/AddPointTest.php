<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Database\Eloquent\Model;

class AddPointTest extends TestCase
{
  public function setUp():void
  {
    parent::setUp();
    //Artisan::call('migrate');
    $this->seed('TestDatabaseSeeder');
  }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testRelation()
    {
      //$this->json('GET', 'api/addFidelityPoint/2', $payload)->assertStatus(200);
    }
}
