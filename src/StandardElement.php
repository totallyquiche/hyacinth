<?php

declare(strict_types=1);

namespace Hyacinth;

abstract class StandardElement extends DomElement
{
    /**
     * The element's content.
     * 
     * @var array
     */
    protected array $content = [];

    /**
     * Returns the string representation of the element.
     * 
     * @return string
     */
    public function __toString() : string {
        return $this->getOpenTag() .
            $this->getRenderedContent() .
            $this->getCloseTag();
    }
    
    /**
     * Return the element's content.
     * 
     * @return array
     */
    public function getContent() : array
    {
        return $this->content;
    }

    /**
     * Return the element's content, rendered as a string.
     * 
     * @return string
     */
    public function getRenderedContent() : string
    {
        return implode('', $this->content);
    }

    /**
     * Set the element's content.
     * 
     * @param array $content
     * 
     * @return StandardElement
     */
    public function setContent(array $content) : StandardElement
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Add to the element's content.
     * 
     * @param array $content
     * 
     * @return StandardElement
     */
    public function addContent(array $content) : StandardElement
    {
        $this->content = array_merge($this->content, $content);

        return $this;
    }

    /**
     * Return the close tag.
     * 
     * @return string
     */
    public function getCloseTag() : string
    {
        return '</' . $this->getTagName() . '>';
    }
}