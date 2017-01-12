<?php

use PHP_CodeSniffer_File as PhpCodeSnifferFile;
use PHP_CodeSniffer_Sniff as PhpSnifferInterface;
use PhpCs\Rules\PhpDoc\Repository\ParamTagRepository;
use PhpCs\Rules\PhpDoc\Repository\ReturnTagRepository;

class SA_Sniffs_Commenting_OneEmptyLineBetweenParamAndReturnAnnotationsSniff implements PhpSnifferInterface
{
    const ERROR_MESSAGE = 'There should be one empty line between @param and @return';

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
        $paramTagRepository = new ParamTagRepository($tokens);

        $returnTags = $returnTagRepository->findAll();

        foreach ($returnTags as $returnTag) {
            $paramTag = $paramTagRepository->findOneBefore($returnTag);

            if ($paramTag && !$paramTag->isThereEmptyLineBefore($returnTag)) {
                $file->addError(self::ERROR_MESSAGE, $stackPtr);
            }
        }
    }
}
