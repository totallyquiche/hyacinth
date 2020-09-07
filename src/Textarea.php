<?php

declare(strict_types=1);

namespace Hyacinth;

use Hyacinth\DomElement;

class Textarea extends StandardElement
{
    /**
     * Return the name of the element.
     * 
     * @var string
     */
    public function getTagName() : string
    {
        return 'textarea';
    }

    /**
     * Return the element's content, rendered as a string.
     * 
     * @return string
     */
    public function getRenderedContent() : string
    {
        return htmlentities(parent::getRenderedContent());
    }
}