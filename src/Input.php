<?php

declare(strict_types=1);

namespace Hyacinth;

use Exception;

class Input extends VoidElement
{
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
     * Return the name of the element.
     * 
     * @var string
     */
    public function getTagName() : string
    {
        return 'input';
    }
}