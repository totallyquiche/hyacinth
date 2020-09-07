<?php

declare(strict_types=1);

namespace Hyacinth;

abstract class DomElement
{
    /**
     * An array of attribute name => value pairs for the element.
     * 
     * @var array
     */
    protected array $attributes = [];

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
     * Returns the string representation of the element.
     * 
     * @return string
     */
    abstract public function __toString() : string;

    /**
     * Sets the initial attributes.
     * 
     * @param array $attributes
     * 
     * @return void
     */
    protected function setInitialAttributes(array $attributes) : void
    {
        $this->setAttributes($attributes);
    }

    /**
     * Set the element's attributes.
     * 
     * @param array
     * 
     * @return DomElement
     */
    public function setAttributes(array $attributes) : DomElement
    {
        $this->attributes = $attributes;

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
     * Add attributes to the element.
     * 
     * @param array $attributes
     * 
     * @return DomElement
     */
    public function addAttributes(array $attributes) : DomElement
    {
        foreach ($attributes as $attribute_name => $attribute_value) {
            $this->setAttribute($attribute_name, $attribute_value);
        }

        return $this;
    }

    /**
     * Remove attributes from the element.
     * 
     * @param array|null $attributes
     * 
     * @return DomElement
     */
    public function removeAttributes(array $attributes = null) : DomElement
    {
        $attributes_to_remove = $attributes ?: $this->getAttributes();
        
        foreach ($attributes_to_remove as $attribute_name => $attribute_value) {
            $this->removeAttribute($attribute_name);
        }

        return $this;
    }

    /**
     * Set an attribute.
     * 
     * @param string      $attribute_name
     * @param string|null $attribute_value
     * 
     * @return DomElement
     */
    public function setAttribute(string $attribute_name, string $attribute_value = null) : DomElement
    {
        $this->attributes[$attribute_name] = $attribute_value;

        return $this;
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
     * Removes an attribute from the element.
     * 
     * @param string $attribute_name
     * 
     * @return DomElement
     */
    public function removeAttribute(string $attribute_name) : DomElement
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
     * Returns the element's open tag.
     * 
     * @return string
     */
    public function getOpenTag() : string
    {
        $open_tag = '<' . $this->getTagName();

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
     * Return the element's tag name.
     * 
     * @return string
     */
    abstract public function getTagName() : string;

    /**
     * Return the close tag.
     * 
     * @return string
     */
    abstract public function getCloseTag() : string;
}