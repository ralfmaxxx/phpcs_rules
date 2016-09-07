<?php

namespace PhpCs\SA\PhpDoc\Repository;

use PhpCs\SA\PhpDoc\ParamTag;
use PhpCs\SA\PhpDoc\Parser\ParamTagParser;
use PhpCs\SA\PhpDoc\ReturnTag;

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
