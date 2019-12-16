<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\User;
use App\CompanyUser;

class AddPointTest extends TestCase
{
  private $company;
  private $user;

  public function setUp():void
  {
    parent::setUp();
    $this->seed('TestDatabaseSeeder');//Run seeder

    //get the company and the user test model
    $this->company = User::where('email', 'company@test.com')->first();
    $this->user = User::where('email', 'client@test.com')->first();

    //delete the relation between the user and the company if it already exist
    CompanyUser::where('user_id', $this->user->id)->where('company_id', $this->company->company()->first()->id)->delete();
    $this->company->company()->update(['number_fidelity_points' => 3]);//set the max fidelity point to 3
  }

  /**
   * corerct parameters must be send to add point
   */
  private function correctParametersForAddPoint()
  {
    $this->actingAs($this->company, 'api')
    ->withHeaders(['Accept' => 'Application/json'])
    ->json('POST', 'api/addFidelityPoint', ['scannedd_user_id' => $this->user->id])
    ->assertStatus(401)
    ->assertJson([
      "status" => "Please send the correct parameter.",
      "number_of_points" => -1
    ]);
  }

  /**
   * user must be a a company to add point
   */
  private function userMustBeCompanyForAddPoint()
  {
    $this->actingAs($this->user, 'api')
    ->withHeaders(['Accept' => 'Application/json'])
    ->json('POST', 'api/addFidelityPoint', ['scanned_user_id' => $this->user->id])
    ->assertStatus(401)
    ->assertJson([
      "status" => "The user must to be a company.",
      "number_of_points" => -1
    ]);
  }

  /**
   * Create Relation between user and company
   */
  private function createRelation()
  {
    $this->actingAs($this->company, 'api')
    ->withHeaders(['Accept' => 'Application/json'])
    ->json('POST', 'api/addFidelityPoint', ['scanned_user_id' => $this->user->id])
    ->assertStatus(201)
    ->assertJson([
      "status" => "The relation between user and company is created.",
      "number_of_points" => 1
    ]);
  }

  /**
   * Add point to a user
   */
  private function addPoint()
  {
    $this->actingAs($this->company, 'api')
    ->withHeaders(['Accept' => 'Application/json'])
    ->json('POST', 'api/addFidelityPoint', ['scanned_user_id' => $this->user->id])
    ->assertStatus(202)
    ->assertJson([
      "status" => "Number of point is updated.",
      "number_of_points" => 2
    ]);
  }

  /**
   * The user reach the maximum number of point
   */
  private function reachMaxPoint()
  {
    $this->actingAs($this->company, 'api')
    ->withHeaders(['Accept' => 'Application/json'])
    ->json('POST', 'api/addFidelityPoint', ['scanned_user_id' => $this->user->id])
    ->assertStatus(202)
    ->assertJson([
      "status" => "The user can reclaim his reward.",
      "number_of_points" => 0
    ]);
  }

  /**
   * Company inc user point when user reach maximum of point
   */
  private function incAfterUserReachMaxPoint()
  {
    $this->actingAs($this->company, 'api')
    ->withHeaders(['Accept' => 'Application/json'])
    ->json('POST', 'api/addFidelityPoint', ['scanned_user_id' => $this->user->id])
    ->assertStatus(409)
    ->assertJson([
      "status" => "Impossible to increment user point. The company must notify user claim is reward.",
      "number_of_points" => 0
    ]);
  }

  /**
   * User must be a company to unlock reward
   */
  private function userMustBeCompanyForUnlockReward()
  {
    $this->actingAs($this->user, 'api')
    ->withHeaders(['Accept' => 'Application/json'])
    ->json('POST', 'api/userGotHisReward', ['scanned_user_id' => $this->user->id])
    ->assertStatus(401)
    ->assertJson([
      "status" => "The user must to be a company.",
    ]);
  }

  private function correctParametersForUnlockReward()
  {
    $this->actingAs($this->company, 'api')
    ->withHeaders(['Accept' => 'Application/json'])
    ->json('POST', 'api/userGotHisReward', ['scannedd_user_id' => $this->user->id])
    ->assertStatus(401)
    ->assertJson([
      "status" => "Please send the correct parameter.",
    ]);
  }

  private function relationMustExistForUnlockReward()
  {
    $this->actingAs($this->company, 'api')
    ->withHeaders(['Accept' => 'Application/json'])
    ->json('POST', 'api/userGotHisReward', ['scanned_user_id' => -1])
    ->assertStatus(401)
    ->assertJson([
      "status" => "the relation between the user and the company doesn't exist.",
    ]);
  }

  private function unlockReward()
  {
    $this->actingAs($this->company, 'api')
    ->withHeaders(['Accept' => 'Application/json'])
    ->json('POST', 'api/userGotHisReward', ['scanned_user_id' =>$this->user->id])
    ->assertStatus(202)
    ->assertJson([
      "status" => "User got his reward.",
    ]);
  }

  private function incUserPointAfterUnlockReward()
  {
    $this->actingAs($this->company, 'api')
    ->withHeaders(['Accept' => 'Application/json'])
    ->json('POST', 'api/addFidelityPoint', ['scanned_user_id' => $this->user->id])
    ->assertStatus(202)
    ->assertJson([
      "status" => "Number of point is updated.",
      "number_of_points" => 1
    ]);
  }

  public function testAddPointFeature()
  {
    $this->correctParametersForAddPoint();
    $this->userMustBeCompanyForAddPoint();
    $this->createRelation();
    $this->addPoint();
    $this->reachMaxPoint();
    $this->incAfterUserReachMaxPoint();
    $this->userMustBeCompanyForUnlockReward();
    $this->correctParametersForUnlockReward();
    $this->relationMustExistForUnlockReward();
    $this->unlockReward();
    $this->incUserPointAfterUnlockReward();
  }
}
