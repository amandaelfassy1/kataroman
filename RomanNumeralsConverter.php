<?php
class RomanNumeralsConverter {
    private $romanNumerals = [
        1000 => 'M',
        900 => 'CM',
        500 => 'D',
        400 => 'CD',
        100 => 'C',
        90 => 'XC',
        50 => 'L',
        40 => 'XL',
        10 => 'X',
        9 => 'IX',
        5 => 'V',
        4 => 'IV',
        1 => 'I',
    ];

    public function convertToRoman($number) {
        if ($number <= 0 || $number >= 4000) {
            throw new InvalidArgumentException("Number out of range (1-3999)");
        }

        $result = '';
        foreach ($this->romanNumerals as $value => $numeral) {
            while ($number >= $value) {
                $result .= $numeral;
                $number -= $value;
            }
        }

        return $result;
    }
}
?>
