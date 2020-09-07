<?php

declare(strict_types=1);

namespace Hyacinty\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Hyacinth\Text;

class TextTest extends TestCase
{
    /**
     * Test __toString() contains text passed to construtor.
     * 
     * @return void
     */
    public function testToString() : void
    {
        $text = 'text';

        $this->assertEquals(
            $text,
            (string) new Text($text)
        );
    }
}