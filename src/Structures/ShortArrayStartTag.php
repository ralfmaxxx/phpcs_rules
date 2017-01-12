<?php

namespace PhpCs\Rules\Structures;

use PhpCs\Rules\Token;

class ShortArrayStartTag
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
     * {@inheritDoc}
     */
    public function getLine()
    {
        return $this->line;
    }

    /**
     * {@inheritDoc}
     */
    public function getPosition()
    {
        return $this->position;
    }
}
