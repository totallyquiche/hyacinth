<?php

declare(strict_types=1);

namespace Hyacinty\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Hyacinth\SelfClosingElement;

class SelfClosingElementTest extends TestCase
{
    /**
     * Create a fake of the SelfClosingElement abstract class.
     * 
     * @return SelfClosingElement
     */
    private function getFake(array $attributes = []) : SelfClosingElement
    {
        return (new class($attributes) extends SelfClosingElement {
            /**
             * The name of the element's tag.
             * 
             * @var string
             */
            public function getTagName() : string
            {
                return 'fake';
            }

             /**
              * Return a string representation of the object.
              *
              * @return string
              */
              public function __toString() : string
              {
                  return '';
              }
        });
    }

    /**
     * Test that the closing tag is in an empty string.
     * 
     * @return void
     */
    public function testCloseTagFormat() : void
    {
        $fake = $this->getFake();

        $this->assertEquals(
            '',
            $fake->getCloseTag()
        );
    }
}