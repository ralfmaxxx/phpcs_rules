<?php

namespace PhpCs\Rules\PhpDoc;

final class ParamTag
{
    private $line;

    private $position;

    private function __construct()
    {
    }

    /**
     * @param array $token
     * @param int $position
     *
     * @return ParamTag
     */
    public static function createFromTokenAndPosition(array $token, $position)
    {
        $self = new self();
        $self->line = $token['line'];
        $self->position = $position;

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
