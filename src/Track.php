<?php

declare(strict_types=1);

namespace Hyacinth;

use Hyacinth\DomElement;

class Track extends SelfClosingElement
{
    /**
     * Return the name of the element.
     * 
     * @var string
     */
    public function getTagName() : string
    {
        return 'track';
    }
}