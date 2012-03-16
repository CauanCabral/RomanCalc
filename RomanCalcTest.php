<?php
include('RomanCalc.php');
class RomanCalcTest extends PHPUnit_Framework_TestCase
{
	protected $calc;

	protected function setUp()
    {
        $this->calc = new RomanCalc();
    }

    public function testIplusI()
    {
    	$result = $this->calc->sum('I', 'I');
    	$expected = 'II';

    	$this->assertEquals($expected, $result);
    }

    public function testIVplusIV()
    {
    	$result = $this->calc->sum('IV', 'IV');
    	$expected = 'VIII';

    	$this->assertEquals($expected, $result);
    }

    public function testXVplusIV()
    {
        $result = $this->calc->sum('XV', 'IV');
        $expected = 'XIX';

        $this->assertEquals($expected, $result);
    }

    public function testDplusD()
    {
        $result = $this->calc->sum('D', 'D');
        $expected = 'M';

        $this->assertEquals($expected, $result);
    }
}