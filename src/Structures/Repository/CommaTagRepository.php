<?php

namespace PhpCs\Rules\Structures\Repository;

use PhpCs\Rules\Structures\CommaTag;
use PhpCs\Rules\Structures\Parser\CommaTagParser;
use PhpCs\Rules\TagInterface;

class CommaTagRepository
{
    /**
     * @var CommaTagParser
     */
    private $parser;

    public function __construct(array $tokens)
    {
        $this->parser = new CommaTagParser($tokens);
    }

    /**
     * @param TagInterface $tag
     *
     * @return null|CommaTag
     */
    public function findLastCommaOneLineAbove(TagInterface $tag)
    {
        $commaToken = $this->parser->findLastOneLineAbove($tag);

        return $commaToken ? CommaTag::createFromToken($commaToken) : null;
    }
}
