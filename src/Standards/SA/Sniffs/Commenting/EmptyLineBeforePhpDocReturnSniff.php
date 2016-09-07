<?php

use PHP_CodeSniffer_File as PhpCodeSnifferFile;
use PHP_CodeSniffer_Sniff as PhpSnifferInterface;
use PhpCs\SA\PhpDoc\Repository\ParamTagRepository;
use PhpCs\SA\PhpDoc\Repository\ReturnTagRepository;

class SA_Sniffs_Commenting_EmptyLineBeforePhpDocReturnSniff implements PhpSnifferInterface
{
    const ERROR_MESSAGE = 'There should be empty line between @param and @return';

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
