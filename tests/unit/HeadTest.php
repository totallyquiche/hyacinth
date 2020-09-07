<?php

declare(strict_types=1);

namespace Hyacinty\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Hyacinth\NonVoidElement;
use Hyacinth\Head;
use Hyacinth\Title;
use Hyacinth\Text;

class HeadTest extends TestCase
{
    /**
     * Test that the element can be instantiated.
     * 
     * @return void
     */
    public function testCanInstantiate() : void
    {
        $this->assertInstanceOf(NonVoidElement::class, new Head([], new Title([], new Text('title'))));
    }

    /**
     * Test that getTagName() returns expected value.
     * 
     * @return void
     */
    public function testGetTagName() : void
    {
        $this->assertEquals(
            'head',
            (new Head([], new Title([], new Text('title'))))->getTagName()
        );
    }


    /**
     * Test a new instance has a title in its content array.
     * 
     * @return void
     */
    public function testTitleInContent() : void
    {
        $title = new Title([], new Text('title'));

        $this->assertEquals(
            [$title],
            (new Head([], $title))->getContent()
        );
    }
}