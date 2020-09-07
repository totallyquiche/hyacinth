<?php

declare(strict_types=1);

namespace Hyacinty\Tests\Unit;

use PHPUnit\Framework\TestCase;
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
        $this->assertInstanceOf(Textarea::class, new Textarea);
    }
}