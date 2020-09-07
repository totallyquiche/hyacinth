<?php

declare(strict_types=1);

namespace Hyacinth;

use Hyacinth\DomElement;
use Hyacinth\Text;

class Title extends NonVoidElement
{
    /**
     * Initialize the element. Set the Text content.
     * 
     * @param array $attributes
     * @param Text  $text
     */
    public function __construct(array $attributes = [], Text $text)
    {
        parent::__construct($attributes);

        $this->addContent([$text]);
    }

    /**
     * Return the name of the element.
     * 
     * @var string
     */
    public function getTagName() : string
    {
        return 'title';
    }
}