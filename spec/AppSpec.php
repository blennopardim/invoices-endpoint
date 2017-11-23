<?php

use Kahlan\Plugin\Monkey;
use Sofa\LaravelKahlan\Env;
use Illuminate\Contracts\Foundation\Application;

describe('Test laravel app', function () {
  it('creates laravel app', function () {
  	expect(app())->toBeAnInstanceOf(Application::class);
  });
});
