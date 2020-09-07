<?php

declare(strict_types=1);

namespace Hyacinty\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Hyacinth\StandardElement;

class StandardElementTest extends TestCase
{
    /**
     * Create a fake of the StandardElement abstract class.
     * 
     * @return StandardElement
     */
    private function getFake(array $attributes = []) : StandardElement
    {
        return (new class($attributes) extends StandardElement {
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
            '</' . $fake->getTagName() . '>',
            $fake->getCloseTag()
        );
    }
}