<?php
require('Roman2Decimal.php');
class Roman2DecimalTest extends PHPUnit_Framework_TestCase
{
	protected $r2d;

	protected function setUp()
    {
        $this->r2d = new Roman2Decimal();
    }

    public function testIto1()
    {
    	$result = $this->r2d->convert('I');
    	$expected = 1;

    	$this->assertEquals($expected, $result);
    }

    public function testIIIto3()
    {
    	$result = $this->r2d->convert('III');
    	$expected = 3;

    	$this->assertEquals($expected, $result);
    }

    public function testIVto4()
    {
    	$result = $this->r2d->convert('IV');
    	$expected = 4;

    	$this->assertEquals($expected, $result);
    }

    public function testXXto20()
    {
    	$result = $this->r2d->convert('XX');
    	$expected = 20;

    	$this->assertEquals($expected, $result);
    }

    public function testXXVto25()
    {
    	$result = $this->r2d->convert('XXV');
    	$expected = 25;

    	$this->assertEquals($expected, $result);
    }

    public function testMIto1001()
    {
    	$result = $this->r2d->convert('MI');
    	$expected = 1001;

    	$this->assertEquals($expected, $result);
    }
}