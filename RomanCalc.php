<?php
require('Roman2Decimal.php');
require('Decimal2Roman.php');
class RomanCalc
{
	protected $r2d;
	protected $d2r;

	public function __construct()
	{
		$this->r2d = new Roman2Decimal();
		$this->d2r = new Decimal2Roman();
	}

	public function sum($one, $two)
	{
		$d1 = $this->convert($one);
		$d2 = $this->convert($two);

		return $this->convert($d1 + $d2);
	}

	protected function convert($v)
	{
		if(is_integer($v))
		{
			return $this->d2r->convert($v);
		}

		return $this->r2d->convert($v);
	}
}