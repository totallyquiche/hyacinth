<?php

declare(strict_types=1);

namespace Hyacinth;

class Text
{
    /**
     * The actual string content.
     * 
     * @var string
     */
    private string $content = '';

    /**
     * Initialize the object. Set the content of the object.
     * 
     * @param string $content
     * 
     * @return void
     */
    public function __construct(string $content = '')
    {
        $this->setContent($content);
    }

    /**
     * Set the content.
     * 
     * @param string $content
     * 
     * @return Text
     */
    public function setContent(string $content) : Text
    {
        $this->content = $content;

        return $this;
    }

    /**
     * The string representation of the object.
     * 
     * @return string
     */
    public function __toString() : string
    {
        return $this->content;
    }
}