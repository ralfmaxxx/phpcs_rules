<?php

namespace PhpCs\Rules\PhpDoc\Parser;

use PhpCs\Rules\PhpDoc\TagInterface;
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

    /**
     * @param TagInterface $tag
     *
     * @return null|Token
     */
    public function findOneBefore(TagInterface $tag)
    {
        for ($position = $tag->getPosition() - 1; !$this->isCommentBeginning($this->tokens[$position]); $position--) {
            $token = $this->tokens[$position];

            if ($this->isReturnTag($token)) {
                return Token::createFromTokenAndHisPosition($token, $position);
            }
        }

        return null;
    }

    private function isReturnTag(array $token)
    {
        return $token['type'] == 'T_DOC_COMMENT_TAG' && $token['content'] == self::RETURN_PHP_DOC;
    }

    private function isCommentBeginning($token)
    {
        return $token['type'] == 'T_DOC_COMMENT_OPEN_TAG';
    }
}
