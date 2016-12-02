<?php

namespace Fraction\Helpers;

use Fraction\Fraction;
use InvalidArgumentException;

class OperationHelper
{
    /**
     * @param Fraction $fraction
     * @param int $desiredDenominator
     *
     * @return Fraction
     *
     * @throws InvalidArgumentException
     */
    static function bringFractionToDenominator(Fraction &$fraction, $desiredDenominator)
    {

        if (!is_integer($desiredDenominator)) {
            throw new InvalidArgumentException("A denominator should always be an integer! ($desiredDenominator) given");
        }

        $numerator = $fraction->getNumerator() * $desiredDenominator / $fraction->getDenominator();
        if (!is_integer($numerator)) {
            throw new InvalidArgumentException("A numerator should always be an integer! ($numerator) given");

        }
        $fraction->setNumerator($numerator);
        $fraction->setDenominator($desiredDenominator);
        return $fraction;
    }
}