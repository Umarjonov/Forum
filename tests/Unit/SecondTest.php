<?php

namespace Tests\Unit;

use Tests\TestCase;

class SecondTest extends TestCase
{
    public function test_Example()
    {
//        $this->assertTrue(true);
        $this->get('/seconds')->assertStatus(200);
    }
}
