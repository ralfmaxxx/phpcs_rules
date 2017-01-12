<?php

namespace PhpCs\Rules\Structures\Repository;

use PhpCs\Rules\Structures\Parser\ShortArrayStartTagParser;
use PhpCs\Rules\Structures\ShortArrayStartTag;
use PhpCs\Rules\TagInterface;

class ShortArrayStartTagRepository
{
    public function __construct(array $tokens)
    {
        $this->parser = new ShortArrayStartTagParser($tokens);
    }

    /**
     * @param TagInterface $tag
     *
     * @return null|ShortArrayStartTag
     */
    public function findAtTheSameLine(TagInterface $tag)
    {
        $shortArrayStartTag = $this->parser->findAtTheSameLine($tag);

        return $shortArrayStartTag ? ShortArrayStartTag::createFromToken($shortArrayStartTag) : null;
    }
}
