<?php

use Kahlan\Plugin\Monkey;
use Sofa\LaravelKahlan\Env;
use Illuminate\Contracts\Foundation\Application;

describe('Test laravel app', function () 
{
  it('creates laravel app', function () {
  	expect(app())->toBeAnInstanceOf(Application::class);
  });
});

describe('Test user endpoint', function() 
{
 
  it('create_user /api/users', function() 
  {
    $user_values = [
      'name' => 'Blenno Cleofas Pardim',
      'cpf' => '03869076178',
      'birthdate' => '1990-08-23'
    ];
    $response = $this->laravel->post('/api/users', $user_values);
    $response->assertStatus(200)
             ->assertJson($user_values);
  });

  
});