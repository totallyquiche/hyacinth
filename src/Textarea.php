<?php

declare(strict_types=1);

namespace Hyacinth;

use Hyacinth\DomElement;

class Textarea extends DomElement
{
    /**
     * The name of the element.
     * 
     * @var string
     */
    protected string $tag_name = 'textarea';
}