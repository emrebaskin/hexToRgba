<?php

use PHPUnit\Framework\TestCase;


class HexToRgbaTest extends TestCase
{
    /**
     * Tests if a short hex code can be converted into a normal 6 digit hex code.
     */
    public function testShortHexCanBeTurnedIntoLong()
    {
        $this->assertEquals('FFFFFF', convertLongHex('FFF'));
        $this->assertEquals('FF7700', convertLongHex('F70'));
    }

    /**
     * Tests that an error must be thrown if hex code has invalid number of characters.
     */
    public function testHexLengthValidation()
    {
        $this->expectException(Error::class);
        hexToRgba('FFFFF', 1);
    }

    /**
     * Tests if hex color code has digits that are not in hexadecimal system.
     */
    public function testHexValidation()
    {
        $this->expectException(Error::class);
        hexToRgba('FFFFFG');
    }

    /**
     * Tests a hex color code can be converted to rgba format as string.
     */
    public function testHexCanBeConvertedToRgb()
    {
        $this->assertEquals('rgb(255, 255, 255, 0.3)', hexToRgba('#FFF', '0.3'));
        $this->assertEquals('rgb(255, 255, 255, 1)', hexToRgba('#FFFFFF', 1));
        $this->assertEquals('rgb(255, 255, 255, 0.5)', hexToRgba('FFF', '.5'));
        $this->assertEquals('rgb(255, 255, 255, 1)', hexToRgba('FFFFFF', 1));
    }
}