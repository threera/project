<?php

namespace PhpOffice\PhpSpreadsheetTests\Calculation\Functions\Statistical;

use PhpOffice\PhpSpreadsheet\Calculation\Functions;
use PhpOffice\PhpSpreadsheet\Calculation\Statistical;
use PHPUnit\Framework\TestCase;

class ExponDistTest extends TestCase
{
    protected function setUp(): void
    {
        Functions::setCompatibilityMode(Functions::COMPATIBILITY_EXCEL);
    }

    /**
     * @dataProvider providerEXPONDIST
     *
     * @param mixed $expectedResult
     */
    public function testEXPONDIST($expectedResult, ...$args): void
    {
        $result = Statistical::EXPONDIST(...$args);
        self::assertEqualsWithDelta($expectedResult, $result, 1E-12);
    }

    public function providerEXPONDIST()
    {
        return require 'tests/data/Calculation/Statistical/EXPONDIST.php';
    }
}
