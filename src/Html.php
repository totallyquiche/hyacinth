<?php

declare(strict_types=1);

namespace Hyacinth;

use Hyacinth\DomElement;

class Html extends NonVoidElement
{
    /**
     * Call the parent's constructor and set the "lang" attribute.
     * 
     * @param array      $attributes
     * @param string     $lang
     * 
     * @return void
     */
    public function __construct(array $attributes = [], string $lang = 'en')
    {
        parent::__construct($attributes);

        $this->setLang($lang);
    }

    /**
     * Return the name of the element.
     * 
     * @var string
     */
    public function getTagName() : string
    {
        return 'html';
    }

    /**
     * Set the "lang" attribute.
     * 
     * @param string     $lang
     * 
     * @return void
     */
    public function setLang(string $lang = 'en') : DomElement
    {
        $this->setAttribute('lang', $lang);

        return $this;
    }
}