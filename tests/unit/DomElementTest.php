<?php

declare(strict_types=1);

namespace Hyacinty\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Hyacinth\DomElement;

class DomElementTest extends TestCase
{
    /**
     * Create a fake of the DomElement abstract class.
     * 
     * @return DomElement
     */
    private function getFake(array $attributes = []) : DomElement
    {
        return (new class($attributes) extends DomElement {
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

            /**
             * Return the close tag.
             * 
             * @return string
             */
            public function getCloseTag() : string
            {
                return '';
            }
        });
    }

    /**
     * Test getOpenTag() returns expected value when the element has no attributes.
     * 
     * @return void
     */
    public function testGetOpenTagWhenElementHasNoAttributes() : void
    {
        $fake = $this->getFake();

        $fake->removeAttributes();
        
        $this->assertEquals(
            '<' . $fake->getTagName() . '>',
            $fake->getOpenTag()
        );
    }

    /**
     * Test getOpenTag() returns expected value when element has one attribute.
     * 
     * @return void
     */
    public function testGetOpenTagWhenElementHasOneAttribute() : void
    {
        $fake = $this->getFake();

        $fake->setAttributes([
            'type' => 'text'
        ]);
        
        $this->assertEquals(
            '<' . $fake->getTagName() .' type="text">',
            $fake->getOpenTag()
        );
    }

    /**
     * Test getOpenTag() returns expected value when element has many attributes.
     * 
     * @return void
     */
    public function testGetOpenTagWhenElementHasManyAttributes() : void
    {
        $fake = $this->getFake();
        
        $fake->setAttributes([
            'type' => 'text',
            'placeholder' => 'text'
        ]);
        
        $this->assertEquals(
            '<' . $fake->getTagName() . ' type="text" placeholder="text">',
            $fake->getOpenTag()
        );
    }

    /**
     * Test getOpenTag() returns expected value when element has one attribute and
     * it is a boolean.
     * 
     * @return void
     */
    public function testGetOpenTagWhenElementHasOneBooleanAttribute() : void
    {
        $fake = $this->getFake();
        
        $fake->setAttributes([
            'disabled' => null
        ]);
        
        $this->assertEquals(
            '<' . $fake->getTagName() . ' disabled>',
            $fake->getOpenTag()
        );
    }

    /**
     * Test getOpenTag() returns expected value when Element has many attributes and
     * one is a boolean.
     * 
     * @return void
     */
    public function testGetOpenTagWhenElementHasManyAttributesWithABoolean() : void
    {
        $fake = $this->getFake();
        
        $fake->setAttributes([
            'type' => 'text',
            'disabled' => null
        ]);

        $fake->setAttribute('disabled');
        
        $this->assertEquals(
            '<' . $fake->getTagName() . ' type="text" disabled>',
            $fake->getOpenTag()
        );
    }

    /**
     * Test getOpenTag() returns expected value when Element has many boolean attributes.
     * 
     * @return void
     */
    public function testGetOpenTagWhenElementHasManyBooleanAttributes() : void
    {
        $fake = $this->getFake();
        
        $fake->removeAttributes();
        $fake->setAttributes([
            'disabled' => null,
            'autofocus' => null
        ]);
        
        $this->assertEquals(
            '<' . $fake->getTagName() . ' disabled autofocus>',
            $fake->getOpenTag()
        );
    }

    /**
     * Data provider for testing hasAttributes().
     * 
     * @return array
     */
    public function hasAttributesDataProvider() : array
    {
        return [
            'Has all checked attributes' => [
                'attributes_to_assign' => [
                    'type' => 'text',
                    'disabled' => null,
                    'placeholder' => 'text'
                ],
                'attributes_to_check' => [
                    'type' => true,
                    'disabled' => true,
                    'placeholder' => true
                ]
            ],
            'Has some checked attributes' => [
                'attributes_to_assign' => [
                    'type' => 'text',
                    'disabled' => null,
                    'placeholder' => 'text'
                ],
                'attributes_to_check' => [
                    'type' => true,
                    'disabled' => true,
                    'placeholder' => true,
                    'style' => false
                ]
            ],
            'Has no checked attributes' => [
                'attributes_to_assign' => [
                    'type' => 'text',
                    'disabled' => null,
                    'placeholder' => 'text'
                ],
                'attributes_to_check' => [
                    'style' => false,
                    'width' => false,
                    'height' => false
                ]
            ],
            'Has no attributes' => [
                'attributes_to_assign' => [
                ],
                'attributes_to_check' => [
                    'type' => false,
                    'disabled' => false,
                    'placeholder' => false
                ]
            ]
        ];
    }

    /**
     * Test that a new element has the attributes passed to the constructor.
     * 
     * @dataProvider hasAttributesDataProvider
     * 
     * @param array $attributes_to_assign
     * @param array $attributes_to_check
     * 
     * @return void
     */
    public function testHasAttributes(array $attributes_to_assign, array $attributes_to_check) : void
    {
        $fake = $this->getFake($attributes_to_assign);
        
        foreach ($attributes_to_check as $attribute_name => $expected_value) {
            $this->assertEquals(
                $expected_value,
                $fake->hasAttribute($attribute_name)
            );
        }
    }

    /**
     * Data provider for testing testAssigningAttributesFromConstructor().
     * 
     * @return array
     */
    public function assigningAttributesFromConstructorDataProvider() : array
    {
        return [
            'Assign one attribute' => [
                'attributes_to_assign' => [
                    'type' => 'text'
                ]
            ],
            'Assign all boolean attributes' => [
                'attributes_to_assign' => [
                    'disabled' => null,
                    'checked' => null
                ]
            ],
            'Assign all non-boolean attributes' => [
                'attributes_to_assign' => [
                    'type' => 'text',
                    'placeholder' => 'text'
                ]
            ],
            'Assign some boolean and some non-boolean attributes' => [
                'attributes_to_assign' => [
                    'disabled' => null,
                    'type' => 'text'
                ]
            ]
        ];
    }

    /**
     * Test that the element has the attributes passed to the constructor.
     * 
     * @dataProvider assigningAttributesFromConstructorDataProvider
     * 
     * @param array $attributes_to_assign
     * @param array $attributes_to_check
     * 
     * @return void
     */
    public function testAssigningAttributesFromConstructor(array $attributes_to_assign) : void
    {
        $fake = $this->getFake($attributes_to_assign);

        foreach ($attributes_to_assign as $attribute_name => $attribute_value) {
            $this->assertEquals(
                $attribute_value,
                $fake->getAttributeValue($attribute_name)
            );
        }
    }

    /**
     * Test that an attribute's value can be changed.
     * 
     * @return void
     */
    public function testAttributeValueCanBeChanged() : void
    {
        $fake = $this->getFake();
        
        $fake->setAttribute('type', 'checkbox');

        $this->assertEquals(
            'checkbox',
            $fake->getAttributeValue('type')
        );
    }

    /**
     * Test an attribute's value can be retrieved from an element.
     * 
     * @return void
     */
    public function testCanRetrieveAttributeValue() : void
    {
        $this->assertEquals(
            'text',
            $this->getFake()
                ->setAttribute('type', 'text')
                ->getAttributeValue('type')
        );
    }

    /**
     * Test that an attribute can be added to the element.
     * 
     * @return void
     */
    public function testCanSetAttribute() : void
    {
        $fake = $this->getFake();

        $fake->setAttribute('placeholder', 'test');

        $this->assertEquals(
            'test',
            $fake->getAttributeValue('placeholder')
        );
    }

    /**
     * Test that a boolean attribute can be set.
     * 
     * @return void
     */
    public function testCanSetBooleanAttribute() : void
    {
        $this->assertTrue(
            $this->getFake()
                ->setAttribute('disabled')
                ->hasAttribute('disabled')
        );
    }

    /**
     * Test that an attribute can be removed from the element.
     * 
     * @return void
     */
    public function testCanRemoveAttribute() : void
    {
        $this->assertFalse(
            $this->getFake()
                ->setAttribute('type', 'text')
                ->removeAttribute('type')
                ->hasAttribute('type')
        );
    }

    /**
     * Test that a boolean attribute can be removed.
     * 
     * @return void
     */
    public function testCanRemoveBooleanAttribute() : void
    {
        $this->assertFalse(
            $this->getFake()
                ->setAttribute('disabled')
                ->removeAttribute('disabled')
                ->hasAttribute('disabled')
        );
    }

    /**
     * Data provider for testing testAddAttributes().
     * 
     * @return array
     */
    public function addAttributesDataProvider() : array
    {
        return [
            'Assign one attribute' => [
                'attributes_to_assign' => [
                    'type' => 'text'
                ]
            ],
            'Assign all boolean attributes' => [
                'attributes_to_assign' => [
                    'disabled' => null,
                    'checked' => null
                ]
            ],
            'Assign all non-boolean attributes' => [
                'attributes_to_assign' => [
                    'type' => 'text',
                    'placeholder' => 'text'
                ]
            ],
            'Assign some boolean and some non-boolean attributes' => [
                'attributes_to_assign' => [
                    'disabled' => null,
                    'type' => 'text'
                ]
            ]
        ];
    }

    /**
     * Test add attributes adds attributes.
     * 
     * @dataProvider addAttributesDataProvider
     * 
     * @param array $attributes
     * 
     * @return void
     */
    public function testAddAttributes(array $attributes) : void
    {
        $fake = $this->getFake();
        
        $fake->addAttributes($attributes);

        foreach ($attributes as $attribute_name => $attribute_value) {
            $this->assertTrue(
                $fake->hasAttribute($attribute_name)
            );
        }
    }

    /**
     * Test setAttributes().
     * 
     * @dataProvider addAttributesDataProvider
     * 
     * @param array $attributes
     * 
     * @return void
     */
    public function testSetAttributes(array $attributes) : void
    {
        $this->assertEquals(
            $attributes,
            $this->getFake()
                ->setAttributes($attributes)
                ->getAttributes()
        );
    }

    /**
     * Test setAttributes() with empty array.
     * 
     * @return void
     */
    public function testSetAttributesWithEmptyArray() : void
    {
        $this->assertEmpty(
            $this->getFake()
                ->setAttributes([])
                ->getAttributes()
        );
    }

    /**
     * Test add attributes adds attributes with expected values.
     * 
     * @dataProvider addAttributesDataProvider
     * 
     * @param array $attributes
     * 
     * @return void
     */
    public function testAddAttributesWithExpectedValues(array $attributes) : void
    {
        $fake = $this->getFake();
        
        $fake->addAttributes($attributes);

        foreach ($attributes as $attribute_name => $attribute_value) {
            $this->assertEquals(
                $attribute_value,
                $fake->getAttributeValue($attribute_name)
            );   
        }
    }

    /**
     * Test add attributes does not remove existing attributes.
     * 
     * @return void
     */
    public function testAddAttributesDoesNotRemoveExistingAttributes() : void
    {
        $attributes = [
            'disabled' => null,
            'placeholder' => 'text'
        ];

        $this->assertEquals(
            ['type' => 'text'] + $attributes,
            $this->getFake()
                ->setAttribute('type', 'text')
                ->addAttributes($attributes)
                ->getAttributes()
        );
    }

    /**
     * Test removeAttributes() removes the attributes from the element.
     * 
     * @return void
     */
    public function testRemoveAttributeRemovesAttributes() : void
    {
        $attributes = [
            'disabled' => null,
            'placeholder' => 'text'
        ];

        $this->assertEmpty(
            $this->getFake()
                ->setAttributes($attributes)
                ->removeAttributes($attributes)
                ->getAttributes()
        );
    }

    /**
     * Test removeAttributes() removes only the expected attributes from the element.
     * 
     * @return void
     */
    public function testRemoveAttributeRemovesOnlyExpectedAttributes() : void
    {
        $attributes = [
            'disabled' => null,
            'placeholder' => 'text'
        ];

        $this->assertEquals(
            ['type' => 'text'],
            $this->getFake()
                ->setAttribute('type', 'text')
                ->removeAttributes($attributes)
                ->getAttributes()
        );
    }

    /**
     * Test removeAttributes() removes all attributes when none are specified.
     * 
     * @return void
     */
    public function testRemoveAttributeRemovesAllAttributes() : void
    {
        $this->assertEmpty(
            $this->getFake()
                ->removeAttributes()
                ->getAttributes()
        );
    }
}