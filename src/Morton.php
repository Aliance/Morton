<?php
namespace Aliance\Morton;

/**
 * Z-order curve implementation.
 */
class Morton
{
    /**
     * @var array
     */
    const BITS = [
        0x55555555,
        0x33333333,
        0x0F0F0F0F,
        0x00FF00FF,
    ];

    /**
     * @var array
     */
    const SHIFTS = [
        1,
        2,
        4,
        8,
    ];

    /**
     * @param int $x
     * @param int $y
     * @return int
     */
    public function interleave(int $x, int $y): int
    {
        $x = ($x | ($x << self::SHIFTS[3])) & self::BITS[3];
        $x = ($x | ($x << self::SHIFTS[2])) & self::BITS[2];
        $x = ($x | ($x << self::SHIFTS[1])) & self::BITS[1];
        $x = ($x | ($x << self::SHIFTS[0])) & self::BITS[0];

        $y = ($y | ($y << self::SHIFTS[3])) & self::BITS[3];
        $y = ($y | ($y << self::SHIFTS[2])) & self::BITS[2];
        $y = ($y | ($y << self::SHIFTS[1])) & self::BITS[1];
        $y = ($y | ($y << self::SHIFTS[0])) & self::BITS[0];

        return $x | ($y << 1);
    }
}
