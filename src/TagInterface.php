<?php

namespace PhpCs\Rules;

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
