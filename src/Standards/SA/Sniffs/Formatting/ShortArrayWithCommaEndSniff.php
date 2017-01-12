<?php

use PHP_CodeSniffer_File as PhpCodeSnifferFile;
use PHP_CodeSniffer_Sniff as PhpSnifferInterface;
use PhpCs\Rules\Structures\Repository\CommaTagRepository;
use PhpCs\Rules\Structures\Repository\ShortArrayEndTagRepository;
use PhpCs\Rules\Structures\Repository\ShortArrayStartTagRepository;

class SA_Sniffs_Formatting_ShortArrayWithCommaEndSniff implements PhpSnifferInterface
{
    const ERROR_MESSAGE = 'Short array notation should contain comma at the end if it takes more than one line';

    /**
     * {@inheritDoc}
     */
    public function register()
    {
        return [
            T_OPEN_TAG,
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function process(PhpCodeSnifferFile $file, $stackPtr)
    {
        $tokens = $file->getTokens();

        $shortArrayStartTagRepository = new ShortArrayStartTagRepository($tokens);
        $shortArrayEndTagRepository = new ShortArrayEndTagRepository($tokens);
        $commaTagRepository = new CommaTagRepository($tokens);

        foreach ($shortArrayEndTagRepository->getAll() as $shortArrayEndTag) {
            if (!$shortArrayStartTagRepository->findAtTheSameLine($shortArrayEndTag) && !$commaTagRepository->findLastCommaOneLineAbove($shortArrayEndTag)) {
                $file->addError(self::ERROR_MESSAGE, $stackPtr);
            }
        };
    }
}
