<?php

namespace PhpCs\Rules\PhpDoc\Repository;

use PhpCs\Rules\PhpDoc\ParamTag;
use PhpCs\Rules\PhpDoc\Parser\ParamTagParser;
use PhpCs\Rules\TagInterface;

class ParamTagRepository
{
    /**
     * @var ParamTagParser
     */
    private $parser;

    public function __construct(array $tokens)
    {
        $this->parser = new ParamTagParser($tokens);
    }

    /**
     * @param TagInterface $tag
     *
     * @return null|ParamTag
     */
    public function findOneBefore(TagInterface $tag)
    {
        $paramTagToken = $this->parser->findOneBefore($tag);

        return $paramTagToken ? ParamTag::createFromToken($paramTagToken) : null;
    }
}
