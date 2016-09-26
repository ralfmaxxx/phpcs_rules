<?php

use PHP_CodeSniffer_File as PhpCodeSnifferFile;
use PHP_CodeSniffer_Sniff as PhpSnifferInterface;
use PhpCs\Rules\PhpDoc\Repository\ParamTagRepository;
use PhpCs\Rules\PhpDoc\Repository\ReturnTagRepository;
use PhpCs\Rules\PhpDoc\Repository\ThrowTagRepository;
use PhpCs\Rules\PhpDoc\TagInterface;

class SA_Sniffs_Commenting_OneEmptyLineBetweenThrowsAndParamAnnotationsSniff implements PhpSnifferInterface
{
    const ERROR_MESSAGE = 'There should be one empty line between @param and @throws when @return tag is not present';

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

        $throwTagRepository = new ThrowTagRepository($tokens);
        $returnTagRepository = new ReturnTagRepository($tokens);
        $paramTagRepository = new ParamTagRepository($tokens);

        $throwTags = $throwTagRepository->findAll();

        foreach ($throwTags as $throwTag) {
            if ($this->isNoReturnTagBefore($returnTagRepository, $throwTag) && $this->isNoThrowTagBefore($throwTagRepository, $throwTag)) {
                $paramTag = $paramTagRepository->findOneBefore($throwTag);

                if ($paramTag && !$paramTag->isThereEmptyLineBefore($throwTag)) {
                    $file->addError(self::ERROR_MESSAGE, $stackPtr);
                }
            }
        }
    }

    private function isNoReturnTagBefore(ReturnTagRepository $returnTagRepository, TagInterface $tag)
    {
        $returnTag = $returnTagRepository->findOneBefore($tag);

        return is_null($returnTag);
    }

    private function isNoThrowTagBefore(ThrowTagRepository $throwTagRepository, TagInterface $tag)
    {
        $returnTag = $throwTagRepository->findOneBefore($tag);

        return is_null($returnTag);
    }
}
