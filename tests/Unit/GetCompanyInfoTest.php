<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\User;

class GetCompanyInfoTest extends TestCase
{

    public function testGetCompaniesInfo()
    {
      $user = User::where('email', 'client@test.com')->first();
      $this->actingAs($user, 'api')
           ->withHeaders(['Accept' => 'Application/json'])
           ->json('GET', 'api/companies')
           ->assertStatus(200)
           ->assertJsonStructure([
             "data" => [
               '*' => [
                 "company_name",
                 "company_description",
                 "latitude",
                 "longitude"
               ]
             ]
           ]);
    }
}
