<?php
use PHPUnit\Framework\TestCase;

require_once 'RomanNumeralsConverter.php';

class RomanNumeralsConverterTest extends TestCase {
    public function testConvertToRomanWithValidInput() {
        $converter = new RomanNumeralsConverter();

        $this->assertEquals("I", $converter->convertToRoman(1));
        $this->assertEquals("IV", $converter->convertToRoman(4));
        $this->assertEquals("IX", $converter->convertToRoman(9));
        $this->assertEquals("X", $converter->convertToRoman(10));
        $this->assertEquals("XX", $converter->convertToRoman(20));
        $this->assertEquals("XL", $converter->convertToRoman(40));
        $this->assertEquals("L", $converter->convertToRoman(50));
        $this->assertEquals("XC", $converter->convertToRoman(90));
        $this->assertEquals("C", $converter->convertToRoman(100));
        $this->assertEquals("D", $converter->convertToRoman(500));
        $this->assertEquals("CM", $converter->convertToRoman(900));
        $this->assertEquals("M", $converter->convertToRoman(1000));
    }

    public function testConvertToRomanWithOutOfRangeInput() {
        $converter = new RomanNumeralsConverter();

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("Number out of range (1-3999)");

        $converter->convertToRoman(0);
    }

    public function testConvertToRomanWithInvalidInput() {
        $converter = new RomanNumeralsConverter();

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("Number out of range (1-3999)");

        $converter->convertToRoman(4000);
    }
}
?>
