<?php

declare(strict_types=1);

namespace Hyacinth;

use Hyacinth\DomElement;

class Textarea extends DomElement
{
    /**
     * String representation of the element.
     * 
     * @return string
     */
    public function __toString() : string
    {
        return '';
    }
}