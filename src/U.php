<?php

declare(strict_types=1);

namespace Hyacinth;

use Hyacinth\DomElement;

class U extends StandardElement
{
    /**
     * Return the name of the element.
     * 
     * @var string
     */
    public function getTagName() : string
    {
        return 'u';
    }
}