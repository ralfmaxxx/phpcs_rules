<?php

use PHP_CodeSniffer_File as PhpCodeSnifferFile;
use PHP_CodeSniffer_Sniff as PhpSnifferInterface;
use PhpCs\Rules\PhpDoc\Repository\ReturnTagRepository;
use PhpCs\Rules\PhpDoc\Repository\ThrowTagRepository;

class SA_Sniffs_Commenting_ReturnAndThrowsAnnotationsWithoutEmptyLinesSniff implements PhpSnifferInterface
{
    const ERROR_MESSAGE = 'There should not be empty lines between @return and @throws';

    /**
     * {@inheritDoc}
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
     * {@inheritDoc}
     */
    public function process(PhpCodeSnifferFile $file, $stackPtr)
    {
        $tokens = $file->getTokens();

        $returnTagRepository = new ReturnTagRepository($tokens);
        $throwTagRepository = new ThrowTagRepository($tokens);

        $returnTags = $returnTagRepository->findAll();

        foreach ($returnTags as $returnTag) {
            $throwTag = $throwTagRepository->findOneAfter($returnTag);

            if ($throwTag && $throwTag->isThereEmptyLinesBefore($returnTag)) {
                $file->addError(self::ERROR_MESSAGE, $stackPtr);
            }
        }
    }
}
