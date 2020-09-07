<?php

declare(strict_types=1);

namespace Hyacinth;

abstract class StandardElement extends DomElement
{
    /**
     * Return the close tag.
     * 
     * @return string
     */
    public function getCloseTag() : string
    {
        return '</' . $this->getTagName() . '>';
    }
}