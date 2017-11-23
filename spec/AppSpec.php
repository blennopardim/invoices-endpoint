<?php

use Kahlan\Plugin\Monkey;
use Sofa\LaravelKahlan\Env;
use Illuminate\Contracts\Foundation\Application;
use App\User;

describe('Test laravel app', function () 
{
  it('creates laravel app', function () {
  	expect(app())->toBeAnInstanceOf(Application::class);
  });
});

describe('Test user endpoint', function() 
{
 
  it('create_user POST /api/users', function() {
    
    $user_values = [
      'name' => 'Blenno Cleofas Pardim',
      'email' => 'blennopardim@gmail.com',
      'cpf' => '03869076178',
      'password' => '123456789',
      'birthdate' => '1990-08-23'
    ];
    $response = $this->laravel->post('/api/users', $user_values);
    $response->assertStatus(200)
             ->assertJson(['cpf' => $user_values['cpf']]);
  });

  it('get user GET /api/users/{id}', function() {
    $user = User::where('cpf','=','03869076178')->first();
    
    $this->laravel->get('/api/users/'.$user->id)
            ->assertStatus(200)
            ->assertJson(['name' => 'Blenno Cleofas Pardim']);
  });

  it('list all users GET /api/users', function ()
  {
      $this->laravel->get('/api/users')
          ->assertStatus(200);
  });

  it('edit user put /api/users/{id}', function() {
    
    $user = User::where('cpf','=','03869076178')->first();
    
    $response = $this->laravel->put('/api/users/'.$user->id , [
            'name' => 'Blenno Pardim'
    ]);
  
   $response->assertStatus(200)
                 ->assertJson(['name' => 'Blenno Pardim']);
  });
  
  it('delete user DELETE /api/users', function () {  
    $user = User::where('cpf','=','03869076178')->first();
    $this->laravel->delete('/api/users/'.$user->id)->assertStatus(200);
  });
  
});