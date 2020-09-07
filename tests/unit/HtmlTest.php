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
            (new Html)->getTagName()
        );
    }

    /**
     * Test setLang() sets the "lang" attribute.
     * 
     * @return void
     */
    public function testSetLang() : void
    {
        $lang = 'fr';

        $this->assertEquals(
            $lang,
            (new Html)->setLang($lang)
                ->getAttributeValue('lang')
        );
    }

    /**
     * Test new instance of element has "lang" attribute set to "en" by default.
     * 
     * @return void
     */
    public function testNewInstanceLangIsEn() : void
    {
        $this->assertEquals(
            'en',
            (new Html)->getAttributeValue('lang')
        );
    }
}