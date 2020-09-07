<?php

declare(strict_types=1);

namespace Hyacinty\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Hyacinth\Dfn;

class DfnTest extends TestCase
{
    /**
     * Test that the element can be instantiated.
     * 
     * @return void
     */
    public function testCanInstantiate() : void
    {
        $this->assertInstanceOf(Dfn::class, new Dfn);
    }

    /**
     * Test that getTagName() returns expected value.
     * 
     * @return void
     */
    public function testGetTagName() : void
    {
        $this->assertEquals(
            'dfn',
            (new Dfn)->getTagName()
        );
    }
}