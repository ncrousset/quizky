<?php

namespace Tests\Unit;

use Tests\TestCase;

class QuizApiUnitTest extends TestCase
{


    public function testCreate()
    {
        $data = [
            'title' => $this->faker->title,
            'public' => rand(0,1)];

        $response = $this->client
            ->request('POST', env('APP_URL').'/api/quizzes', ['form_params' => $data]);

        $this->assertEquals($response->getStatusCode(), 201);

        $contentResponse = json_decode($response->getBody());

        $this->assertIsObject($contentResponse);

        $this->assertEquals($contentResponse->title, $data['title']);
        $this->assertEquals($contentResponse->public, $data['public']);
        $this->assertTrue($contentResponse->id > 0);
    }


//    public function testIndex()
//    {
//
//    }


//    public function testShow()
//    {
//
//    }
//
//    public function testEdit()
//    {
//
//    }
//
//    public function testDelete()
//    {
//
//    }

}
