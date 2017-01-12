<?php

class A
{
    /**
     * @return int $param
     *
     * @throws Exception
     */
    public function one_empty_line($a)
    {
        return 1;
    }

    /**
     * @return int $param
     *
     *
     * @throws Exception
     */
    public function two_empty_lines($a)
    {
        return 2;
    }
}
