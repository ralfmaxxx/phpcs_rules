<?php

namespace PhpCs\Rules;

final class Token
{
    /**
     * @var int
     */
    private $line;

    /**
     * @var string
     */
    private $type;

    /**
     * @var string
     */
    private $content;

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
     * @return Token
     */
    public static function createFromTokenAndHisPosition(array $token, $position)
    {
        $self = new self();

        $self->line = $token['line'];
        $self->type = $token['type'];
        $self->content = $token['content'];
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
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @return int
     */
    public function getPosition()
    {
        return $this->position;
    }
}
