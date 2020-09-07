<?php

declare(strict_types=1);

namespace Hyacinth;

abstract class SelfClosingElement extends DomElement
{
    /**
     * Returns the string representation of the element.
     * 
     * @return string
     */
    public function __toString() : string {
        return $this->getOpenTag() . $this->getCloseTag();
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
}