<?php

namespace PhpCs\Rules\PhpDoc\Repository;

use PhpCs\Rules\PhpDoc\Parser\ReturnTagParser;
use PhpCs\Rules\PhpDoc\ReturnTag;
use PhpCs\Rules\TagInterface;

class ReturnTagRepository
{
    /**
     * @var ReturnTagParser
     */
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

    /**
     * @param TagInterface $tag
     *
     * @return ReturnTag|null
     */
    public function findOneBefore(TagInterface $tag)
    {
        $returnTagToken = $this->parser->findOneBefore($tag);

        return $returnTagToken ? ReturnTag::createFromToken($returnTagToken) : null;
    }
}
