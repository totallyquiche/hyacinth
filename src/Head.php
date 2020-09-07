<?php

declare(strict_types=1);

namespace Hyacinth;

use Hyacinth\Title;
use Hyacinth\Text;

class Head extends NonVoidElement
{
    /**
     * Call the parent's constructor and set the "lang" attribute.
     * 
     * @param array  $attributes
     * @param Title  $title
     * 
     * @return void
     */
    public function __construct(array $attributes = [], Title $title, string $lang = 'en')
    {
        parent::__construct($attributes);

        $this->setTitle($title);
    }

    /**
     * Adds a Title element to this element's content.
     * 
     * @param Title $title
     */
    public function setTitle(Title $title) : DomElement
    {
        $this->addContent([$title]);

        return $this;
    }

    /**
     * Return the name of the element.
     * 
     * @var string
     */
    public function getTagName() : string
    {
        return 'head';
    }
}