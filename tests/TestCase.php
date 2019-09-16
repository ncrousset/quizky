<?php

namespace Tests;

use App\User;
use GuzzleHttp\Client as GuzzleHttp;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, DatabaseMigrations, DatabaseTransactions;

    const HEADERS = [
        'accept' => 'application/json'
    ];

    protected $faker;

    protected $client;

    protected $user;


    /**
     * Set up the test
     */
    public function setUp(): void
    {
        parent::setUp();
        $this->faker = \Faker\Factory::create();

        $this->user = factory(User::class)->create();

        $this->client =  new GuzzleHttp(['headers' => self::HEADERS]);
    }
    /**
     * Reset the migrations
     */
    public function tearDown(): void
    {
        $this->artisan('migrate:reset');
        parent::tearDown();
    }
}
