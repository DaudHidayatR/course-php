<?php
namespace Daudhidayatramadhan\BelajarPhpUnitTest;

use PHPUnit\Framework\TestCase;

class MathTest extends TestCase{
    public function testManual (){
        $this->assertEquals(10, Math::sum([5,5]));
        $this->assertEquals(20, Math::sum([5,5,5,5]));
        $this->assertEquals(8, Math::sum([3,5]));
        $this->assertEquals(12, Math::sum([5,5,2]));

    }

    /**
     * @dataProvider mathSumData
     */
    public function testDataProvider(array $values, int $expected)
    {
        $this->assertEquals($expected,Math::sum($values));
    }

    public function mathSumData():array
    {
        return [
            [[5,5],10],
            [[5,3],8],
            [[],0],
            [[1,1],2]
        ];
    }
    /**
     * @testWith  [[5,5],10]
     *            [[5,3],8]
     *            [[],0]
     *            [[1,1],2]
     */
    public function testWith(array $values, int $expected)
    {
        $this->assertEquals($expected,Math::sum($values));
    }
}