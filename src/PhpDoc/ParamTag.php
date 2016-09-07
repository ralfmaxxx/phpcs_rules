<?php

namespace PhpCs\Rules\PhpDoc;

use PhpCs\Rules\Token;

final class ParamTag
{
    private $line;

    private $position;

    private function __construct()
    {
    }

    /**
     * @param Token $token
     *
     * @return self
     */
    public static function createFromToken(Token $token)
    {
        $self = new self();
        $self->line = $token->getLine();
        $self->position = $token->getPosition();

        return $self;
    }
    /**
     * @return int
     */
    public function getLine()
    {
        return $this->line;
    }

    /**
     * @return int
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * @param ReturnTag $returnTag
     *
     * @return bool
     */
    public function isThereEmptyLineBefore(ReturnTag $returnTag)
    {
        return $returnTag->getLine() - $this->getLine() == 2;
    }
}
