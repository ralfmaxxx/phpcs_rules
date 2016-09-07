<?php

namespace PhpCs\Rules\PhpDoc\Parser;

class ReturnTagParser
{
    const RETURN_PHP_DOC = '@return';

    /**
     * @var array
     */
    private $tokens;

    public function __construct(array $tokens)
    {
        $this->tokens = $tokens;
    }

    /**
     * @return array
     */
    public function getReturnTagTokens()
    {
        return array_filter($this->tokens, function (array $token) {
            return $this->isReturnTag($token);
        });
    }

    private function isReturnTag(array $token)
    {
        return $token['type'] == 'T_DOC_COMMENT_TAG' && $token['content'] == self::RETURN_PHP_DOC;
    }
}
