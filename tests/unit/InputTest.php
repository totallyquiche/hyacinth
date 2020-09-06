<?php

declare(strict_types=1);

namespace Hyacinty\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Hyacinth\Input;

class InputTest extends TestCase
{
    /**
     * Test that an Input can be instantiated.
     * 
     * @return void
     */
    public function testCanInstantiate() : void
    {
        $this->assertInstanceOf(Input::class, new Input);
    }

    /**
     * Test that an Input cast to a string is only its open tag.
     * 
     * @return void
     */
    public function testNewInstanceCastToStringIsOnlyOpenTag() : void
    {
        $input = new Input;

        $this->assertEquals(
            $input->getOpenTag(),
            (string) $input
        );
    }

    /**
     * Test that a new Input has a type of "text" by default.
     * 
     * @return void
     */
    public function testNewInstanceHasTypeSetToText() : void
    {
        $this->assertEquals(
            'text',
            (new Input)->getAttributeValue('type')
        );
    }

    /**
     * Test getTagName() returns "input".
     * 
     * @return void
     */
    public function testGetTagName() : void
    {
        $this->assertEquals(
            'input',
            (new Input)->getTagName()
        );
    }
}