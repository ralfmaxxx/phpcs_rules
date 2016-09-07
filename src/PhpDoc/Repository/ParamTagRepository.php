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

    public function findOneBefore(ReturnTag $returnTag)
    {
        $paramTag = null;

        $paramTagToken = $this->parser->findParamTokenBefore($returnTag);

        if ($paramTagToken) {
            $paramTag = ParamTag::createFromTokenAndPosition(current($paramTagToken), key($paramTagToken));
        }

        return $paramTag;
    }
}
