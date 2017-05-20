<?php
use Aliance\Morton\Morton;
use PHPUnit\Framework\TestCase;

class MortonTest extends TestCase
{
    /**
     * @var Morton
     */
    private $Morton;

    /**
     * @covers \Aliance\Morton\Morton::__construct
     */
    public function testBitmaskCreation()
    {
        $this->assertInstanceOf(Morton::class, $this->Morton);
    }

    /**
     * @covers \Aliance\Morton\Morton::interleave
     * @dataProvider getInterleavePairs
     * @param int $x
     * @param int $y
     * @param int $expected
     */
    public function testMorton(int $x, int $y, int $expected)
    {
        $this->assertEquals($expected, $this->Morton->interleave($x, $y));
    }

    /**
     * @return array
     */
    public function getInterleavePairs(): array
    {
        return [
            [
                2,
                2,
                12,
            ],
            [
                3,
                6,
                45,
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->Morton = new Morton();
    }
}
