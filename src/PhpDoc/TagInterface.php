<?php

namespace PhpCs\Rules\PhpDoc;

interface TagInterface
{
    /**
     * @return int
     */
    public function getLine();

    /**
     * @return int
     */
    public function getPosition();
}
