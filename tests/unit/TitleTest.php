<?php

declare(strict_types=1);

namespace Hyacinty\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Hyacinth\NonVoidElement;
use Hyacinth\Title;
use Hyacinth\Text;

class TitleTest extends TestCase
{
    /**
     * Test that the element can be instantiated.
     * 
     * @return void
     */
    public function testCanInstantiate() : void
    {
        $this->assertInstanceOf(NonVoidElement::class, new Title([], new Text('title')));
    }

    /**
     * Test that getTagName() returns expected value.
     * 
     * @return void
     */
    public function testGetTagName() : void
    {
        $this->assertEquals(
            'title',
            (new Title([], new Text('title')))->getTagName()
        );
    }

    /**
     * Test new instance has text in its content.
     * 
     * @return void
     */
    public function testStringInContent() : void
    {
        $text = new Text('text');

        $this->assertEquals(
            [$text],
            (new Title([], $text))->getContent()
        );
    }
}