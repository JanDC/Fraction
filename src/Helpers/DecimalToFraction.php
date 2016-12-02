<?php

namespace Fraction\Helpers;

use Fraction\Fraction;

class DecimalToFraction
{
    static function decimalToFraction($decimal)
    {
        $decimal = (string)$decimal;
        $num = '';
        $den = 1;
        $dec = false;

        // find least reduced fractional form of number
        for ($i = 0, $ix = strlen($decimal); $i < $ix; $i++) {
            // build the denominator as we 'shift' the decimal to the right
            if ($dec) $den *= 10;

            // find the decimal place/ build the numerator
            if ($decimal{$i} == '.') $dec = true;
            else $num .= $decimal{$i};
        }
        $num = (int)$num;

        // whole number, just return it
        if ($den == 1) return $num;

        $num2 = $num;
        $den2 = $den;
        $rem = 1;
        // Euclid's Algorithm (to find the gcd)
        while ($num2 % $den2) {
            $rem = $num2 % $den2;
            $num2 = $den2;
            $den2 = $rem;
        }
        if ($den2 != $den) $rem = $den2;

        // now $rem holds the gcd of the numerator and denominator of our fraction
        return new Fraction($num / $rem, $den / $rem);
    }
}