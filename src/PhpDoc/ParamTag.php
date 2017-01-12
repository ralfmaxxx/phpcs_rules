<?php

namespace PhpCs\Rules\PhpDoc;

use PhpCs\Rules\TagInterface;
use PhpCs\Rules\Token;

final class ParamTag implements TagInterface
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

    /**
     * @param TagInterface $tag
     *
     * @return bool
     */
    public function isThereEmptyLineBefore(TagInterface $tag)
    {
        return $tag->getLine() - $this->getLine() == 2;
    }
}
