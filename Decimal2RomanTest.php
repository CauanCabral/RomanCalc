<?php
require('Decimal2Roman.php');
class Decimal2RomanTest extends PHPUnit_Framework_TestCase
{
	protected $d2r;

	protected function setUp()
    {
        $this->d2r = new Decimal2Roman();
    }

    public function test12I()
    {
    	$result = $this->d2r->convert(1);
    	$expected = 'I';

    	$this->assertEquals($expected, $result);
    }

    public function test32III()
    {
    	$result = $this->d2r->convert(3);
    	$expected = 'III';

    	$this->assertEquals($expected, $result);
    }

    public function test4toIV()
    {
    	$result = $this->d2r->convert(4);
    	$expected = 'IV';

    	$this->assertEquals($expected, $result);
    }

    public function test20toXX()
    {
    	$result = $this->d2r->convert(20);
    	$expected = 'XX';

    	$this->assertEquals($expected, $result);
    }

    public function test25toXXV()
    {
    	$result = $this->d2r->convert(25);
    	$expected = 'XXV';

    	$this->assertEquals($expected, $result);
    }

    public function test31toXXXI()
    {
    	$result = $this->d2r->convert(31);
    	$expected = 'XXXI';

    	$this->assertEquals($expected, $result);
    }

    public function test40toXL()
    {
    	$result = $this->d2r->convert(40);
    	$expected = 'XL';

    	$this->assertEquals($expected, $result);
    }

    public function test9toIX()
    {
    	$result = $this->d2r->convert(9);
    	$expected = 'IX';

    	$this->assertEquals($expected, $result);
    }

    public function test1001toMI()
    {
    	$result = $this->d2r->convert(1001);
    	$expected = 'MI';

    	$this->assertEquals($expected, $result);
    }

    public function test1044toMXLIV()
    {
    	$result = $this->d2r->convert(1044);
    	$expected = 'MXLIV';

    	$this->assertEquals($expected, $result);
    }

    public function test999toCMXCIX()
    {
    	$result = $this->d2r->convert(999);
    	$expected = 'CMXCIX';

    	$this->assertEquals($expected, $result);
    }

    public function test8toVIII()
    {
        $result = $this->d2r->convert(8);
        $expected = 'VIII';

        $this->assertEquals($expected, $result);
    }
}