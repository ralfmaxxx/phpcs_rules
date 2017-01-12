<?php

namespace PhpCs\Rules\PhpDoc\Parser;

use PhpCs\Rules\TagInterface;
use PhpCs\Rules\Token;

class ParamTagParser
{
    const PARAM_PHP_DOC = '@param';

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
    public function findOneBefore(TagInterface $tag)
    {
        for ($position = $tag->getPosition() - 1; !$this->isCommentBeginning($this->tokens[$position]); $position--) {
            $token = $this->tokens[$position];

            if ($this->isParamToken($token)) {
                return Token::createFromTokenAndHisPosition($token, $position);
            }
        }

        return null;
    }

    private function isParamToken($token)
    {
        return $token['type'] == 'T_DOC_COMMENT_TAG' && $token['content'] == self::PARAM_PHP_DOC;
    }

    private function isCommentBeginning($token)
    {
        return $token['type'] == 'T_DOC_COMMENT_OPEN_TAG';
    }
}
