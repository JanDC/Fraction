<?php

namespace Fraction;

use Fraction\Helpers\DecimalToFraction;
use Fraction\Helpers\OperationHelper;

class Fraction
{
    /** @var  integer */
    private $numerator;

    /** @var  integer */
    private $denominator;

    public function __construct($numerator, $denominator)
    {
        $this->numerator = $numerator;
        $this->denominator = $denominator;
    }

    static function __constructFromFloat($decimal)
    {
        return DecimalToFraction::decimalToFraction($decimal);
    }

    /**
     * @return int
     */
    public function getNumerator()
    {
        return $this->numerator;
    }

    /**
     * @param int $numerator
     * @return Fraction
     */
    public function setNumerator($numerator)
    {
        $this->numerator = $numerator;
        return $this;
    }

    /**
     * @return int
     */
    public function getDenominator()
    {
        return $this->denominator;
    }

    /**
     * @param int $denominator
     * @return Fraction
     */
    public function setDenominator($denominator)
    {
        $this->denominator = $denominator;
        return $this;
    }

    public function toFloat($precision = null)
    {
        if (!is_null($precision)) {

            return round($this->numerator / $this->denominator, $precision);
        }
        return $this->numerator / $this->denominator;
    }

    /**
     * @param Fraction $fraction
     *
     * @return self
     */
    public function addFraction(Fraction $fraction)
    {
        $denominator = $this->denominator * $fraction->denominator;

        $leftFraction = OperationHelper::bringFractionToDenominator($this, $denominator);
        $rightFraction = OperationHelper::bringFractionToDenominator($fraction, $denominator);

        $this->numerator = $leftFraction->numerator + $rightFraction->numerator;
        $this->denominator = $denominator;
        return $this;
    }

    /**
     * @param Fraction $fraction
     *
     * @return self
     */
    public function subtractFraction(Fraction $fraction)
    {
        $denominator = $this->denominator * $fraction->denominator;

        $leftFraction = OperationHelper::bringFractionToDenominator($this, $denominator);
        $rightFraction = OperationHelper::bringFractionToDenominator($fraction, $denominator);

        $this->numerator = $leftFraction->numerator - $rightFraction->numerator;
        $this->denominator = $denominator;

        return $this;
    }

    /**
     * @param Fraction $fraction
     *
     * @return self
     */
    public function multiplyFraction(Fraction $fraction)
    {
        $this->denominator *= $fraction->denominator;
        $this->numerator *= $fraction->numerator;
        return $this;
    }

    /**
     * @param Fraction $fraction
     *
     * @return self
     */
    public function divideFraction(Fraction $fraction)
    {
        $this->denominator *= $fraction->numerator;
        $this->numerator *= $fraction->denominator;
        return $this;
    }
}