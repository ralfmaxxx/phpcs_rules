<?php

namespace PhpCs\SA\PhpDoc;

final class ReturnTag
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
     * @param array $token
     * @param int $position
     *
     * @return ReturnTag
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
}
