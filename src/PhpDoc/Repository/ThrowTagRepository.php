<?php

namespace PhpCs\Rules\PhpDoc\Repository;

use PhpCs\Rules\PhpDoc\Parser\ThrowTagParser;
use PhpCs\Rules\PhpDoc\TagInterface;
use PhpCs\Rules\PhpDoc\ThrowTag;

class ThrowTagRepository
{
    private $parser;

    public function __construct(array $tokens)
    {
        $this->parser = new ThrowTagParser($tokens);
    }

    /**
     * @param TagInterface $tag
     *
     * @return null|ThrowTag
     */
    public function findOneAfter(TagInterface $tag)
    {
        $throwTagToken = $this->parser->findOneAfter($tag);

        return $throwTagToken ? ThrowTag::createFromToken($throwTagToken) : null;
    }

    /**
     * @param TagInterface $tag
     *
     * @return null|ThrowTag
     */
    public function findOneBefore(TagInterface $tag)
    {
        $throwTagToken = $this->parser->findOneBefore($tag);

        return $throwTagToken ? ThrowTag::createFromToken($throwTagToken) : null;
    }

    /**
     * @return ThrowTag[]
     */
    public function findAll()
    {
        $throwTags = [];

        $throwTagTokens = $this->parser->getThrowTagTokens();

        foreach ($throwTagTokens as $throwTagToken) {
            $throwTags[] = ThrowTag::createFromToken($throwTagToken);
        }

        return $throwTags;
    }
}
