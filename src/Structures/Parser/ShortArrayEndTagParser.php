<?php

namespace PhpCs\Rules\Structures\Parser;

use PhpCs\Rules\Token;

class ShortArrayEndTagParser
{
    const SHORT_ARRAY_END = 'T_CLOSE_SHORT_ARRAY';

    private $tokens;

    public function __construct(array $tokens)
    {
        $this->tokens = $tokens;
    }

    /**
     * @return Token[]
     */
    public function getAll()
    {
        $tokens = [];

        foreach ($this->tokens as $position => $token) {
            if ($this->isShortEndArrayToken($token)) {
                $tokens[] = Token::createFromTokenAndHisPosition($token, $position);
            }
        }

        return $tokens;
    }

    private function isShortEndArrayToken(array $token)
    {
        return $token['type'] == self::SHORT_ARRAY_END;
    }
}
