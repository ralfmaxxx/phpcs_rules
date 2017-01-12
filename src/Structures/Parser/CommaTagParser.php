<?php

namespace PhpCs\Rules\Structures\Parser;

use PhpCs\Rules\TagInterface;
use PhpCs\Rules\Token;

class CommaTagParser
{
    const COMMA = 'T_COMMA';

    private $tokens;

    public function __construct(array $tokens)
    {
        $this->tokens = $tokens;
    }

    /**
     * @param TagInterface $tag
     *
     * @return null|Token
     */
    public function findLastOneLineAbove(TagInterface $tag)
    {
        for ($position = $tag->getPosition() - 1; $this->isNotFartherThanTwoLines($tag, $this->tokens[$position]); $position--) {
            $token = $this->tokens[$position];

            if ($this->isCommaToken($token) && $this->isOneLineAbove($tag, $token)) {
                return Token::createFromTokenAndHisPosition($token, $position);
            }
        }

        return null;
    }

    private function isCommaToken(array $token)
    {
        return $token['type'] == self::COMMA;
    }

    private function isNotFartherThanTwoLines(TagInterface $tag, array $token)
    {
        return $tag->getLine() - $token['line'] < 2;
    }

    private function isOneLineAbove(TagInterface $tag, array $token)
    {
        return $tag->getLine() == $token['line'] + 1;
    }
}
