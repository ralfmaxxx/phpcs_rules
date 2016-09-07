<?php

namespace PhpCs\Rules\PhpDoc\Repository;

use PhpCs\Rules\PhpDoc\Parser\ThrowTagParser;
use PhpCs\Rules\PhpDoc\ReturnTag;
use PhpCs\Rules\PhpDoc\ThrowTag;

class ThrowTagRepository
{
    private $parser;

    public function __construct(array $tokens)
    {
        $this->parser = new ThrowTagParser($tokens);
    }

    public function findOneAfter(ReturnTag $returnTag)
    {
        $throwTagToken = $this->parser->findThrowTagAfter($returnTag);

        return $throwTagToken ? ThrowTag::createFromToken($throwTagToken) : null;
    }
}
