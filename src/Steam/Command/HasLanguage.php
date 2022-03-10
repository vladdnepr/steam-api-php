<?php

namespace SquegTech\Steam\Command;

trait HasLanguage
{
    /**
     * @var string
     */
    private string $language;

    /**
     * @param string $language
     * @return $this
     */
    public function setLanguage(string $language): static
    {
        $this->language = $language;
        return $this;
    }
}