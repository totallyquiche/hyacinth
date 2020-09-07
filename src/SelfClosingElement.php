<?php

declare(strict_types=1);

namespace Hyacinth;

abstract class SelfClosingElement extends DomElement
{
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