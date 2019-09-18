<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class QuestionApiUnitTest extends TestCase
{

    protected $response;

    public function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub

        $this->response = $this->actingAs($this->user, 'api');
    }

}
