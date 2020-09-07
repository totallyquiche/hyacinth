<?php

declare(strict_types=1);

namespace Hyacinty\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Hyacinth\Time;

class TimeTest extends TestCase
{
    /**
     * Test that the element can be instantiated.
     * 
     * @return void
     */
    public function testCanInstantiate() : void
    {
        $this->assertInstanceOf(Time::class, new Time);
    }

    /**
     * Test that getTagName() returns expected value.
     * 
     * @return void
     */
    public function testGetTagName() : void
    {
        $this->assertEquals(
            'time',
            (new Time)->getTagName()
        );
    }
}