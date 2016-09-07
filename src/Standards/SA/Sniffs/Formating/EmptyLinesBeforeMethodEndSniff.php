<?php

use PHP_CodeSniffer_File as PhpCodeSnifferFile;
use PHP_CodeSniffer_Sniff as PhpSnifferInterface;

class SA_Sniffs_Formating_EmptyLinesBeforeMethodEndSniff implements PhpSnifferInterface
{
    const ERROR_MESSAGE = 'There should not be empty line at the end of the method';

    /**
     * {@inheritdoc}
     */
    public function register()
    {
        return [
            T_CLASS,
            T_INTERFACE,
            T_TRAIT,
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function process(PhpCodeSnifferFile $file, $stackPtr)
    {
        $tokens = $file->getTokens();

        //TODO: implement this
    }
}
