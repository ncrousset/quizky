<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthApiUnitTest extends TestCase
{

    use RefreshDatabase;

    public function testRegister(): void
    {
        $name = $this->faker->name;

        $data = [
            'name' => $name,
            'email' => $this->faker->email,
            'password' => 'qwer123456',
            'password_confirmation' => 'qwer123456'];

        $response = $this->client
            ->request('POST', env('APP_URL').'/api/register', ['form_params' => $data]);

        $this->assertEquals($response->getStatusCode(), 200);

        $contentResponse = json_decode($response->getBody());

        $this->assertIsObject($contentResponse);
        $this->assertEquals($contentResponse->user->name, $name);
        $this->assertTrue(strlen($contentResponse->access_token) > 500);

    }

}
