<?php

namespace PhpCs\Rules\Structures\Repository;

use PhpCs\Rules\Structures\Parser\ShortArrayEndTagParser;
use PhpCs\Rules\Structures\ShortArrayEndTag;
use PhpCs\Rules\Token;

class ShortArrayEndTagRepository
{
    /**
     * @var ShortArrayEndTagParser
     */
    private $parser;

    public function __construct(array $tokens)
    {
        $this->parser = new ShortArrayEndTagParser($tokens);
    }

    /**
     * @return ShortArrayEndTag[]
     */
    public function getAll()
    {
        return array_map(
            function (Token $token) {
                return ShortArrayEndTag::createFromToken($token);
            },
            $this->parser->getAll()
        );
    }
}
