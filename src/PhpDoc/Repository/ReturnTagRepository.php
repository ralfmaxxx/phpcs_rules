<?php

namespace PhpCs\Rules\PhpDoc\Repository;

use PhpCs\Rules\PhpDoc\Parser\ReturnTagParser;
use PhpCs\Rules\PhpDoc\ReturnTag;

class ReturnTagRepository
{
    private $parser;

    public function __construct(array $tokens)
    {
        $this->parser = new ReturnTagParser($tokens);
    }

    /**
     * @return ReturnTag[]
     */
    public function findAll()
    {
        $returnTags = [];

        $returnTagTokens = $this->parser->getReturnTagTokens();

        foreach ($returnTagTokens as $returnTagToken) {
            $returnTags[] = ReturnTag::createFromToken($returnTagToken);
        }

        return $returnTags;
    }
}
