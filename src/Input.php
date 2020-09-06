<?php

declare(strict_types=1);

namespace Hyacinth;

use Exception;

class Input extends DomElement
{
    /**
     * The tag name of the element.
     * 
     * @var string
     */
    protected $tag_name = 'input';

    /**
     * Sets the initial attributes. Sets the type to "text" if one was not specified.
     * 
     * @param array $attributes
     * 
     * @return void
     */
    protected function setInitialAttributes(array $attributes) : void
    {
        parent::setAttributes($attributes);

        if (!$this->hasAttribute('type')) {
            $this->setAttribute('type', 'text');
        }
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
}