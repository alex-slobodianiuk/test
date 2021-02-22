<?php


namespace app\validator;

/**
 * Class StringValidator
 * @package app\validator
 */
class StringValidator implements ValidatorInterface
{

    /**
     * @param string $value
     * @return bool
     */
    public function valid(string $value): bool
    {
        if (!strlen($value)) return true;

        $regexp = "/[a-zA-Z\s]*/";
        preg_match($regexp, $value, $matches, PREG_OFFSET_CAPTURE);

        if (strlen($matches[0][0]) !== strlen($value)) {
            return false;
        }

        return true;
    }

    /**
     * @return string
     */
    public function getErrorMessage(): string
    {
        return "Allowed just alphabet chars";
    }
}
