<?php


namespace App\Services;


class DumbService
{
    public const TVA_RATE = 19.6;

    public function calcTva($number):float
    {
        return self::TVA_RATE * $number;
    }
}