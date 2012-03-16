<?php
class Decimal2Roman
{
	protected $map = array(
		'I' => 1,
		'V' => 5,
		'X' => 10,
		'L' => 50,
		'C' => 100,
		'D' => 500,
		'M' => 1000
	);

	protected $rules = array(
		'M' => array(
			'repeat' => 3,
			'prefix' => false
		),
		'D' => array(
			'repeat' => 1,
			'prefix' => false
		),
		'C' => array(
			'repeat' => 3,
			'prefix' => true
		),
		'L' => array(
			'repeat' => 1,
			'prefix' => false
		),
		'X' => array(
			'repeat' => 3,
			'prefix' => true
		),
		'V' => array(
			'repeat' => 1,
			'prefix' => false
		),
		'I' => array(
			'repeat' => 3,
			'prefix' => true
		),
	);

	public function convert($d)
	{
		$d = (string)$d;
		$digits = strlen($d);
		$roman = '';

		for($i=0, $j=$digits-1; $i < $digits; $i++, $j--)
		{
			$base = pow(10, $i);
			$roman = $this->greedy($d[$j] * $base) . $roman;
		}

		return $roman;
	}

	protected function greedy($num)
	{
		if($num === 0)
			return '';

		$prefix = 'I';
		foreach($this->map as $rom => $dec)
		{
			if($num === $dec)
				return $rom;

			if($dec !== 1 && $num%$dec === 0)
			{
				// repetições do símbolo
				$v = $num/$dec;

				if($v <= $this->rules[$rom]['repeat'])
				{
					return str_repeat($rom, $v);
				}
			}

			if($num < $dec && $this->rules[$prefix]['prefix'] === true)
			{
				if($num === $this->map[$rom] - $this->map[$prefix])
				{
					return $prefix . $rom;
				}
			}

			$lookahead = next($this->map);
			if($num > $dec && $num < $lookahead && $prefix != $rom)
			{
				$v = ($num-$dec)/$this->map[$prefix];

				if($v <= $this->rules[$prefix]['repeat'])
				{
					return $rom . str_repeat($prefix, $v);
				}
			}

			if($this->rules[$rom]['prefix'])
			{
				$prefix = $rom;
			}

			next($this->map);
		};

		// exceções, II e III
		if($num <= $this->rules['I']['repeat'])
		{
			return str_repeat('I', $num);
		}
	}
}