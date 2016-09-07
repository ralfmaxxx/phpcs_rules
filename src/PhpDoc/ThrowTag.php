<?php

namespace PhpCs\Rules\PhpDoc;

use PhpCs\Rules\Token;

final class ThrowTag
{
    /**
     * @var int
     */
    private $line;

    /**
     * @var int
     */
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

    public function isThereEmptyLinesAfter(ReturnTag $returnTag)
    {
        return $this->getLine() - $returnTag->getLine() > 1;
    }
}
