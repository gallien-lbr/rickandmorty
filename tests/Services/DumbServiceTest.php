<?php
declare(strict_types=1);

namespace App\Tests\Services;

use App\Services\DumbService;
use PHPUnit\Framework\TestCase;

class DumbServiceTest extends TestCase
{
    // 01 - simple dumb test to check TVA is well calculated
    public function testTVACalcSuccess(): void
    {
        // arrange: prepare different values
        $priceHT = 6.99;
        $expected = $priceHT * DumbService::TVA_RATE;

        // call SUT "real" method
        $actual = (new DumbService)->calcTva($priceHT);

        // assert
        $this->assertSame($expected, $actual);
    }
}