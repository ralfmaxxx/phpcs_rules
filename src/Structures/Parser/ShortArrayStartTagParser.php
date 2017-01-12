<?php

namespace PhpCs\Rules\Structures\Parser;

use PhpCs\Rules\TagInterface;
use PhpCs\Rules\Token;

class ShortArrayStartTagParser
{
    const SHORT_ARRAY_START = 'T_OPEN_SHORT_ARRAY';

    private $tokens;

    public function __construct(array $tokens)
    {
        $this->tokens = $tokens;
    }

    /**
     * @param TagInterface $tag
     *
     * @return Token|null
     */
    public function findAtTheSameLine(TagInterface $tag)
    {
        for ($position = $tag->getPosition() - 1; $this->isOnTheSameLine($tag, $this->tokens[$position]); $position--) {
            $token = $this->tokens[$position];

            if ($this->isShortStartArrayToken($token)) {
                return Token::createFromTokenAndHisPosition($token, $position);
            }
        }
    }

    private function isShortStartArrayToken(array $token)
    {
        return $token['type'] == self::SHORT_ARRAY_START;
    }

    private function isOnTheSameLine(TagInterface $tag, $token)
    {
        return $tag->getLine() == $token['line'];
    }
}
