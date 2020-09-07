<?php

declare(strict_types=1);

namespace Hyacinty\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Hyacinth\Fieldset;

class FieldsetTest extends TestCase
{
    /**
     * Test that the element can be instantiated.
     * 
     * @return void
     */
    public function testCanInstantiate() : void
    {
        $this->assertInstanceOf(Fieldset::class, new Fieldset);
    }

    /**
     * Test that getTagName() returns expected value.
     * 
     * @return void
     */
    public function testGetTagName() : void
    {
        $this->assertEquals(
            'fieldset',
            (new Fieldset)->getTagName()
        );
    }
}