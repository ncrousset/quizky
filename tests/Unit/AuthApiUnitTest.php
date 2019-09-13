<?php

namespace Tests\Unit;

use Tests\TestCase;

class AuthApiUnitTest extends TestCase
{

    public function testRegister(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);

        $response = $this->withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/x-www-form-urlencoded'
        ])->json('POST', 'api/register',
            ['name' => 'Sally',
                'email' => 'sally@gmail.com',
                'password' =>'qwer123456',
                'password_confirmation' => 'qwer123456']
        );

    }

}
