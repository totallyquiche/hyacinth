<?php

declare(strict_types=1);

namespace Hyacinth;

use Exception;

class Input
{
    /**
     * An array of attribute name => value pairs for the element.
     * 
     * @var array
     */
    private $attributes = [];

    /**
     * Instantiate the object. Set the type.
     * 
     * @param array
     * 
     * @return void
     */
    public function __construct(array $attributes = [])
    {
        $this->setInitialAttributes($attributes);
    }

    /**
     * Sets the initial attributes. Sets the type to "text" if one was not specified.
     * 
     * @param array $attributes
     * 
     * @return void
     */
    private function setInitialAttributes(array $attributes) : void
    {
        $this->setAttributes($attributes);

        if (!$this->hasAttribute('type')) {
            $this->setAttribute('type', 'text');
        }
    }

    /**
     * Set the element's attributes.
     * 
     * @param array
     * 
     * @return Input
     */
    public function setAttributes(array $attributes) : Input
    {
        $this->attributes = $attributes;

        return $this;
    }

    /**
     * Add attributes to the element.
     * 
     * @param array $attributes
     * 
     * @return Input
     */
    public function addAttributes(array $attributes) : Input
    {
        foreach ($attributes as $attribute_name => $attribute_value) {
            $this->setAttribute($attribute_name, $attribute_value);
        }

        return $this;
    }

    /**
     * Get the element's attributes.
     * 
     * @return array
     */
    public function getAttributes() : array
    {
        return $this->attributes;
    }

    /**
     * Returns the element's open tag.
     * 
     * @return string
     */
    public function getOpenTag() : string
    {
        $open_tag = '<input';

        foreach ($this->getAttributes() as $attribute_name => $attribute_value) {
            if (is_null($attribute_value)) {
                $open_tag .= ' ' . $attribute_name;
            } else {
                $open_tag .= ' ' . $attribute_name . '="' . $attribute_value . '"';
            }
        }

        $open_tag .= '>';

        return $open_tag;
    }

    /**
     * Returns the string representation of the element.
     * 
     * @return string
     */
    public function __toString() : string
    {
        return $this->getOpenTag();
    }

    /**
     * Retrieve an attribute's value.
     * 
     * @param string $attribute_name
     * 
     * @return null|string
     */
    public function getAttributeValue(string $attribute_name) : ?string
    {
        return $this->attributes[$attribute_name];
    }

    /**
     * Set an attribute.
     * 
     * @param string      $attribute_name
     * @param string|null $attribute_value
     * 
     * @return Input
     */
    public function setAttribute(string $attribute_name, string $attribute_value = null) : Input
    {
        $this->attributes[$attribute_name] = $attribute_value;

        return $this;
    }

    /**
     * Removes an attribute from the element.
     * 
     * @param string $attribute_name
     * 
     * @return Input
     */
    public function removeAttribute(string $attribute_name) : Input
    {
        unset($this->attributes[$attribute_name]);

        return $this;
    }

    /**
     * Returns a boolean indicating whether the element has an attribute.
     * 
     * @param string $attribute_name
     * 
     * @return bool
     */
    public function hasAttribute(string $attribute_name) : bool
    {
        return array_key_exists(
            $attribute_name,
            $this->getAttributes()
        );
    }

    /**
     * Remove attributes from the element.
     * 
     * @param array|null $attributes
     * 
     * @return Input
     */
    public function removeAttributes(array $attributes = null) : Input
    {
        $attributes_to_remove = $attributes ?: $this->getAttributes();
        
        foreach ($attributes_to_remove as $attribute_name => $attribute_value) {
            $this->removeAttribute($attribute_name);
        }

        return $this;
    }
}