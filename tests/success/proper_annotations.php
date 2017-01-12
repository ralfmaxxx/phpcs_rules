<?php

class A
{
    const TEST_ARRAY = [1,2,3];

    const TEST_ARRAY_MORE_THAN_ONE_LINE = [
        1,
        2,
        3,
    ];

    /**
     * @param int $a
     *
     * @return int
     * @throws Exception
     */
    public function one_param_and_return_and_throws($a)
    {
        return 1;
    }

    /**
     * @param int $a
     * @param int $b
     *
     * @return int
     * @throws Exception
     */
    public function two_params_and_return_and_throws($a, $b)
    {
        return 1;
    }

    /**
     * @param int $a
     *
     * @return int
     */
    public function param_and_return($a)
    {
        return 1;
    }

    /**
     * @return int
     * @throws Exception
     */
    public function return_and_one_throws($a)
    {
        return 1;
    }


    /**
     * @return int
     * @throws Exception
     * @throws LogicException
     */
    public function return_and_two_throws($a)
    {
        return 1;
    }

    /**
     * @return int
     */
    public function only_return($a)
    {
        return 1;
    }

    /**
     * @throws Exception
     * @throws LogicException
     */
    public function two_throws($a)
    {
        return 1;
    }

    /**
     * @param int $a
     * @param int $b
     */
    public function only_parameters($a, $b)
    {
        return 1;
    }
}
