<?php

abstract class TestCase extends Laravel\Lumen\Testing\TestCase
{

    protected function setUp(): void
    {
        parent::setUp();
        $this->testHeaders = array(
            'X-TIAVers' => '4.01',
            'X-Api-Key' => 'f74c17930166886ee8839bc793c9fe96',
            'X-Token' => 'ad6a050bfd24f6f8ab0264b0f84cf766'
        );
    }

    /**
     * Creates the application.
     *
     * @return \Laravel\Lumen\Application
     */
    public function createApplication()
    {
        return require __DIR__.'/../bootstrap/app.php';
    }
}
