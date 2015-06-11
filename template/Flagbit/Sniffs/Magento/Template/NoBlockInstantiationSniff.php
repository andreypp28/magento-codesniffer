<?php
class Flagbit_Sniffs_Magento_Template_NoBlockInstantiationSniff extends Flagbit_Sniffs_Magento_Template_AbstractSniff
{


    public function register()
    {
        return array(T_STRING);
    }


    protected function _process(PHP_CodeSniffer_File $phpcsFile, $stackPtr)
    {
        $tokens = $phpcsFile->getTokens();

        if ($tokens[$stackPtr]['content'] === 'getBlockSingleton') {
            if ($tokens[$stackPtr - 1]['code'] === T_DOUBLE_COLON) {
                $phpcsFile->addError('Block instantiation in templates is prohibited', $stackPtr);
            }
        }
    }


}