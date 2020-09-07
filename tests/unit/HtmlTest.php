<?php

declare(strict_types=1);

namespace Hyacinty\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Hyacinth\NonVoidElement;
use Hyacinth\Html;

class HtmlTest extends TestCase
{
    /**
     * Test that the element is an instance of NonVoidElement.
     * 
     * @return void
     */
    public function testCanInstantiate() : void
    {
        $this->assertInstanceOf(NonVoidElement::class, new Html);
    }

    /**
     * Test that getTagName() returns expected value.
     * 
     * @return void
     */
    public function testGetTagName() : void
    {
        $this->assertEquals(
            'html',
            (new html)->getTagName()
        );
    }
}