<?php

declare(strict_types=1);

namespace Hyacinth;

use Hyacinth\DomElement;

class Source extends VoidElement
{
    /**
     * Return the name of the element.
     * 
     * @var string
     */
    public function getTagName() : string
    {
        return 'source';
    }
}