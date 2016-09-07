<?php

namespace PhpCs\Rules\PhpDoc\Repository;

use PhpCs\Rules\PhpDoc\ParamTag;
use PhpCs\Rules\PhpDoc\Parser\ParamTagParser;
use PhpCs\Rules\PhpDoc\ReturnTag;

class ParamTagRepository
{
    public function __construct(array $tokens)
    {
        $this->parser = new ParamTagParser($tokens);
    }

    /**
     * @param ReturnTag $returnTag
     *
     * @return null|ParamTag
     */
    public function findOneBefore(ReturnTag $returnTag)
    {
        $paramTagToken = $this->parser->findParamTokenBefore($returnTag);

        return $paramTagToken ? ParamTag::createFromToken($paramTagToken) : null;
    }
}
