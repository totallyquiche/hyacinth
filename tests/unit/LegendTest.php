<?php

declare(strict_types=1);

namespace Hyacinty\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Hyacinth\NonVoidElement;
use Hyacinth\Legend;

class LegendTest extends TestCase
{
    /**
     * Test that the element can be instantiated.
     * 
     * @return void
     */
    public function testCanInstantiate() : void
    {
        $this->assertInstanceOf(NonVoidElement::class, new Legend);
    }

    /**
     * Test that getTagName() returns expected value.
     * 
     * @return void
     */
    public function testGetTagName() : void
    {
        $this->assertEquals(
            'legend',
            (new Legend)->getTagName()
        );
    }
}