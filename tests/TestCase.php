<?php

namespace Maksa988\MonobankAPI\Test;

use Maksa988\MonobankAPI\MonobankAPI;
use PHPUnit\Framework\TestCase as Orchestra;

class TestCase extends Orchestra
{
    /**
     * @var MonobankAPI
     */
    protected $api;

    public function setUp()
    {
        parent::setUp();

        $this->api = new MonobankAPI('TEST_TOKEN');
    }
}
