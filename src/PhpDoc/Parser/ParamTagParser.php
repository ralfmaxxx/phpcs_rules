<?php

namespace PhpCs\SA\PhpDoc\Parser;

use PhpCs\SA\PhpDoc\ReturnTag;

class ParamTagParser
{
    const PARAM_PHP_DOC = '@param';

    /**
     * @var array
     */
    private $tokens;

    public function __construct(array $tokens)
    {
        $this->tokens = $tokens;
    }

    /**
     * @param ReturnTag $returnTag
     *
     * @return array
     */
    public function findParamTokenBefore(ReturnTag $returnTag)
    {
        for ($position = $returnTag->getPosition(); !$this->isCommentBeginning($this->tokens[$position]); $position--) {
            $token = $this->tokens[$position];
            if ($this->isParamToken($token)) {
                return [$position => $token];
            }
        }

        return [];
    }

    /**
     * @param array $token
     *
     * @return bool
     */
    private function isParamToken($token)
    {
        return $token['type'] == 'T_DOC_COMMENT_TAG' && $token['content'] == self::PARAM_PHP_DOC;
    }

    /**
     * @param array $token
     *
     * @return bool
     */
    private function isCommentBeginning($token)
    {
        return $token['type'] == 'T_DOC_COMMENT_OPEN_TAG';
    }
}
