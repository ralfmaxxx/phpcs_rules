<?php

namespace PhpCs\Rules\PhpDoc\Parser;

use PhpCs\Rules\Token;

class ReturnTagParser
{
    const RETURN_PHP_DOC = '@return';

    private $tokens;

    public function __construct(array $tokens)
    {
        $this->tokens = $tokens;
    }

    /**
     * @return Token[]
     */
    public function getReturnTagTokens()
    {
        $tokens = [];

        foreach ($this->tokens as $position => $token) {
            if ($this->isReturnTag($token)) {
                $tokens[] = Token::createFromTokenAndHisPosition($token, $position);
            }
        }

        return $tokens;
    }

    private function isReturnTag(array $token)
    {
        return $token['type'] == 'T_DOC_COMMENT_TAG' && $token['content'] == self::RETURN_PHP_DOC;
    }
}
