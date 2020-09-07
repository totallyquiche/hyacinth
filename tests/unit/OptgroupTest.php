<?php

declare(strict_types=1);

namespace Hyacinty\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Hyacinth\Optgroup;

class OptgroupTest extends TestCase
{
    /**
     * Test that the element can be instantiated.
     * 
     * @return void
     */
    public function testCanInstantiate() : void
    {
        $this->assertInstanceOf(Optgroup::class, new Optgroup);
    }

    /**
     * Test that getTagName() returns expected value.
     * 
     * @return void
     */
    public function testGetTagName() : void
    {
        $this->assertEquals(
            'optgroup',
            (new Optgroup)->getTagName()
        );
    }
}