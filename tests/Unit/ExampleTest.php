<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.v
     *
     * @return void
     */
    public function testBasicTest()
    {
//        $this->mock
//            ->shouldReceive('all')
//            ->once()
//            ->andReturn('foo');
//
//        $this->app->instance('Post', $this->mock);
//
//        $this->call('GET', 'register');
//
//        $this->assertViewHas('register');

        $this->visit('/')
            ->see('Laravel 4');
    }
}
