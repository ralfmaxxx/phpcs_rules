<?php

namespace PhpCs\SA\PhpDoc\Repository;

use PhpCs\SA\PhpDoc\Parser\ReturnTagParser;
use PhpCs\SA\PhpDoc\ReturnTag;

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

        foreach ($returnTagTokens as $position => $returnTagToken) {
            $returnTags[] = ReturnTag::createFromTokenAndPosition($returnTagToken, $position);
        }

        return $returnTags;
    }
}
