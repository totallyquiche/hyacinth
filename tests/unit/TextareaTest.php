<?php

declare(strict_types=1);

namespace Hyacinty\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Hyacinth\NonVoidElement;
use Hyacinth\Textarea;

class TextareaTest extends TestCase
{
    /**
     * Test that the element can be instantiated.
     * 
     * @return void
     */
    public function testCanInstantiate() : void
    {
        $this->assertInstanceOf(NonVoidElement::class, new Textarea);
    }

    /**
     * Test that getTagName() returns expected value.
     * 
     * @return void
     */
    public function testGetTagName() : void
    {
        $this->assertEquals(
            'textarea',
            (new Textarea)->getTagName()
        );
    }

    /**
     * Test that rendered content does not contain HTML.
     * 
     * @return void
     */
    public function testRenderedContentDoesNotContainHtml() : void
    {
        $content = '<div>text</div>';

        $this->assertEquals(
            htmlentities($content),
            (new Textarea)->setContent([$content])
                ->getRenderedContent()
        );
    }
}