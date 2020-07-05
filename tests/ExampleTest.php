<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->get('/');

        $res = json_decode($this->response->getContent(), TRUE);
        $this->assertTrue($res['success']);
        $this->assertEquals(
            $this->app->version(), $res['version']
        );
    }
}
