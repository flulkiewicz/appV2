<?php

namespace Tests\Unit;

use App\Utils\StringUtils;
use PHPUnit\Framework\TestCase;

class BasicTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $utils = new StringUtils();
        $result = $utils->uppercase('test');
        $this->assertEquals('TEST', $result);
    }
}
