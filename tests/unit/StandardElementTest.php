<?php

declare(strict_types=1);

namespace Hyacinty\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Hyacinth\StandardElement;
use StdClass;

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
        });
    }

    /**
     * Test addContent() adds content.
     * 
     * @return void
     */
    public function testAddContent() : void
    {
        $content = [
            'some content',
            (new class {
                /**
                 * Return this object as a string.
                 * 
                 * @return string
                 */
                public function __toString() : string {
                    return 'class';
                }
            }),
            12345,
            6.789
        ];

        $this->assertEquals(
            $content,
            $this->getFake()
                ->addContent($content)
                ->getContent()
        );
    }

    /**
     * Test addContent() adds content and doesn't remove existing content.
     * 
     * @return void
     */
    public function testAddContentDoesNotRemoveExistingContent() : void
    {
        $initial_content = [
            'some content',
            (new class {
                /**
                 * Return this object as a string.
                 * 
                 * @return string
                 */
                public function __toString() : string {
                    return 'class';
                }
            })
        ];

        $additional_content = [
            12345,
            6.789
        ];

        $this->assertEquals(
            array_merge($initial_content, $additional_content),
            $this->getFake()
                ->setContent($initial_content)
                ->addContent($additional_content)
                ->getContent()
        );
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

    /**
     * Test getRenderedContent() returns a string representation of the content
     * in the array, in the expected order.
     * 
     * @return void
     */
    public function testGetRenderedContent() : void
    {
        $content = [
            'some content',
            (new class {
                /**
                 * Return this object as a string.
                 * 
                 * @return string
                 */
                public function __toString() : string {
                    return 'class';
                }
            }),
            12345,
            6.789
        ];

        $rendered_content = implode('', $content);

        $this->assertEquals(
            $rendered_content,
            $this->getFake()
                ->setContent($content)
                ->getRenderedContent()
        );
    }

    /**
     * Test __toString() when there is no content.
     * 
     * @return void
     */
    public function testToStringWithNoContent() : void
    {
        $fake = $this->getFake();

        $this->assertEquals(
            $fake->getOpenTag() . $fake->getCloseTag(),
            (string) $fake
        );
    }

    /**
     * Test __toString() when there is content.
     * 
     * @return void
     */
    public function testToStringWithContent() : void
    {
        $content = [
            'some content',
            (new class {
                /**
                 * Return this object as a string.
                 * 
                 * @return string
                 */
                public function __toString() : string {
                    return 'class';
                }
            }),
            12345,
            6.789
        ];

        $fake = $this->getFake()
            ->setContent($content);

        $this->assertEquals(
            $fake->getOpenTag() . $fake->getRenderedContent() . $fake->getCloseTag(),
            (string) $fake
        );
    }
}