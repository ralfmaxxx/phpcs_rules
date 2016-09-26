<?php

namespace PhpCs\Rules\PhpDoc\Parser;

use PhpCs\Rules\PhpDoc\TagInterface;
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
     * @param TagInterface $tag
     *
     * @return null|Token
     */
    public function findOneAfter(TagInterface $tag)
    {
        for ($position = $tag->getPosition(); !$this->isCommentEnd($this->tokens[$position]); $position++) {
            $token = $this->tokens[$position];

            if ($this->isThrowToken($token)) {
                return Token::createFromTokenAndHisPosition($token, $position);
            }
        }

        return null;
    }

    /**
     * @param TagInterface $tag
     *
     * @return null|Token
     */
    public function findOneBefore(TagInterface $tag)
    {
        for ($position = $tag->getPosition(); !$this->isCommentBeginning($this->tokens[$position]); $position--) {
            $token = $this->tokens[$position];

            if ($this->isThrowToken($token)) {
                return Token::createFromTokenAndHisPosition($token, $position);
            }
        }

        return null;
    }

    /**
     * @return Token[]
     */
    public function getThrowTagTokens()
    {
        $tokens = [];

        foreach ($this->tokens as $position => $token) {
            if ($this->isThrowToken($token)) {
                $tokens[] = Token::createFromTokenAndHisPosition($token, $position);
            }
        }

        return $tokens;
    }

    private function isThrowToken(array $token)
    {
        return $token['type'] == 'T_DOC_COMMENT_TAG' && $token['content'] == self::THROW_PHP_DOC;
    }

    private function isCommentEnd(array $token)
    {
        return $token['type'] == 'T_DOC_COMMENT_CLOSE_TAG';
    }

    private function isCommentBeginning($token)
    {
        return $token['type'] == 'T_DOC_COMMENT_OPEN_TAG';
    }
}
