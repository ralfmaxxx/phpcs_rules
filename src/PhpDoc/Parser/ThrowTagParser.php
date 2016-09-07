<?php

namespace PhpCs\Rules\PhpDoc\Parser;

use PhpCs\Rules\PhpDoc\ReturnTag;
use PhpCs\Rules\Token;

class ThrowTagParser
{
    const THROW_PHP_DOC = '@throws';

    private $tokens;

    public function __construct(array $tokens)
    {
        $this->tokens = $tokens;
    }

    /**
     * @param ReturnTag $returnTag
     *
     * @return null|Token
     */
    public function findThrowTagAfter(ReturnTag $returnTag)
    {
        for ($position = $returnTag->getPosition(); !$this->isCommentEnd($this->tokens[$position]); $position++) {
            $token = $this->tokens[$position];

            if ($this->isThrowToken($token)) {
                return Token::createFromTokenAndHisPosition($token, $position);
            }
        }

        return null;
    }

    private function isThrowToken(array $token)
    {
        return $token['type'] == 'T_DOC_COMMENT_TAG' && $token['content'] == self::THROW_PHP_DOC;
    }

    private function isCommentEnd(array $token)
    {
        return $token['type'] == 'T_DOC_COMMENT_CLOSE_TAG';
    }
}
