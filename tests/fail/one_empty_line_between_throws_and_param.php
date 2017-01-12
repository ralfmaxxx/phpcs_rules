<?php

class A
{
    /**
     * @param int $param
     * @throws Exception
     */
    public function no_empty_line($a)
    {
        return 1;
    }

    /**
     * @param int $param
     *
     *
     * @throws Exception
     */
    public function two_empty_lines($a)
    {
        return 2;
    }
}
