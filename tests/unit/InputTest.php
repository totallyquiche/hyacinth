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
     * Test that getTagName() returns expected value.
     */
    public function testGetTagName() : void
    {
        $this->assertEquals(
            'input',
            (new Input)->getTagName()
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
}