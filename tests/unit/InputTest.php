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
     * Test that an Input can be cast as a string.
     * 
     * @return void
     */
    public function testCanCastToString() : void
    {
        $this->assertIsString((string) new Input);
    }

    /**
     * Test that an input cast to a string is only its open tag.
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
     * Test getOpenTag() returns expected value when Input has no attributes.
     * 
     * @return void
     */
    public function testGetOpenTagWhenInputHasNoAttributes() : void
    {
        $input = new Input;

        $input->removeAttributes();
        
        $this->assertEquals(
            '<input>',
            $input->getOpenTag()
        );
    }


    /**
     * Test getOpenTag() returns expected value when Input has one attribute.
     * 
     * @return void
     */
    public function testGetOpenTagWhenInputHasOneAttribute() : void
    {
        $input = (new Input)->setAttributes([
            'type' => 'text'
        ]);
        
        $this->assertEquals(
            '<input type="text">',
            $input->getOpenTag()
        );
    }

    /**
     * Test getOpenTag() returns expected value when Input has many attributes.
     * 
     * @return void
     */
    public function testGetOpenTagWhenInputHasManyAttributes() : void
    {
        $input = new Input;

        $input->setAttributes([
            'type' => 'text',
            'placeholder' => 'text'
        ]);
        
        $this->assertEquals(
            '<input type="text" placeholder="text">',
            $input->getOpenTag()
        );
    }

    /**
     * Test getOpenTag() returns expected value when Input has one attribute and
     * it is a boolean.
     * 
     * @return void
     */
    public function testGetOpenTagWhenInputHasOneBooleanAttribute() : void
    {
        $input = new Input;

        $input->setAttributes([
            'disabled' => null
        ]);
        
        $this->assertEquals(
            '<input disabled>',
            $input->getOpenTag()
        );
    }

    /**
     * Test getOpenTag() returns expected value when Input has many attributes and
     * one is a boolean.
     * 
     * @return void
     */
    public function testGetOpenTagWhenInputHasManyAttributesWithABoolean() : void
    {
        $input = (new Input)->setAttributes([
            'type' => 'text',
            'disabled' => null
        ]);

        $input->setAttribute('disabled');
        
        $this->assertEquals(
            '<input type="text" disabled>',
            $input->getOpenTag()
        );
    }

    /**
     * Test getOpenTag() returns expected value when Input has many boolean attributes.
     * 
     * @return void
     */
    public function testGetOpenTagWhenInputHasManyBooleanAttributes() : void
    {
        $input = new Input;

        $input->removeAttributes();
        $input->setAttributes([
            'disabled' => null,
            'autofocus' => null
        ]);
        
        $this->assertEquals(
            '<input disabled autofocus>',
            $input->getOpenTag()
        );
    }

    /**
     * Test that a new Input has a type equal to whatever was passed to the constructor.
     * 
     * @return void
     */
    public function testNewInstanceHasTypePassedToConstructor() : void
    {
        $this->assertEquals(
            'checkbox',
            (new Input)
                ->setAttribute('type', 'checkbox')
                ->getAttributeValue('type')
        );
    }

    /**
     * Test that the default type is "text".
     * 
     * @return void
     */
    public function testDefaultTypeIsText() : void
    {
        $this->assertEquals(
            'text',
            (new Input)->getAttributeValue('type')
        );
    }

    /**
     * Test that an attribute's value can be changed.
     * 
     * @return void
     */
    public function testAttributeValueCanBeChanged() : void
    {
        $input = (new Input)->setAttribute('type', 'checkbox');

        $this->assertEquals(
            'checkbox',
            $input->getAttributeValue('type')
        );
    }

    /**
     * Test an attribute's value can be retrieved from an Input.
     * 
     * @return void
     */
    public function testCanRetrieveAttributeValueFromInput() : void
    {
        $this->assertEquals(
            'text',
            (new Input)
                ->setAttribute('type', 'text')
                ->getAttributeValue('type')
        );
    }

    /**
     * Test that an attribute can be added to the Input.
     * 
     * @return void
     */
    public function testCanAddAttributeToInput() : void
    {
        $input = (new Input)->setAttribute('placeholder', 'test');

        $this->assertEquals(
            'test',
            $input->getAttributeValue('placeholder')
        );
    }
    
    /**
     * Test that hasAttribute() returns true if attribute exists
     * 
     * @return void
     */
    public function testHasAttributeReturnsTrueIfAttributeExists() : void
    {
        $this->assertTrue(
            (new Input)
                ->setAttribute('type', 'text')
                ->hasAttribute('type')
        );
    }

    /**
     * Test that hasAttribute() returns false if attribute does not exist.
     * 
     * @return void
     */
    public function testHasAttributeReturnsFalseIfAttributeDoesNotExist() : void
    {
        $this->assertFalse(
            (new Input)
                ->removeAttributes()
                ->hasAttribute('type')
        );
    }

    /**
     * Test that an attribute can be removed from the Input.
     * 
     * @return void
     */
    public function testCanRemoveAttributeFromInput() : void
    {
        $this->assertFalse(
            (new Input)
                ->setAttribute('type', 'text')
                ->removeAttribute('type')
                ->hasAttribute('type')
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
            (new Input)
                ->setAttribute('disabled')
                ->hasAttribute('disabled')
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
            (new Input)
                ->setAttribute('disabled')
                ->removeAttribute('disabled')
                ->hasAttribute('disabled')
        );
    }

    /**
     * Test add attributes adds attributes.
     * 
     * @return void
     */
    public function testAddAttributesAddsAttributes() : void
    {
        $attributes = [
            'disabled' => null,
            'placeholder' => 'text'
        ];
        
        $input = (new Input)->addAttributes($attributes);

        foreach ($attributes as $attribute_name => $attribute_value) {
            $this->assertTrue($input->hasAttribute($attribute_name));
        }
    }

    /**
     * Test add attributes sets correct values..
     * 
     * @return void
     */
    public function testAddAttributesAddsCorrectAttributeValues() : void
    {
        $attributes = [
            'disabled' => null,
            'placeholder' => 'text'
        ];
        
        $input = (new Input)->addAttributes($attributes);

        foreach ($attributes as $attribute_name => $attribute_value) {
            $this->assertEquals(
                $attribute_value,
                $input->getAttributeValue($attribute_name)
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
            (new Input)
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
            (new Input)
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
            (new Input)
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
            (new Input)
                ->removeAttributes()
                ->getAttributes()
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