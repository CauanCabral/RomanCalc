<?php
class Roman2Decimal
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
			'prefix' => false
		),
		'D' => array(
			'prefix' => false
		),
		'C' => array(
			'prefix' => true
		),
		'L' => array(
			'prefix' => false
		),
		'X' => array(
			'prefix' => true
		),
		'V' => array(
			'prefix' => false
		),
		'I' => array(
			'prefix' => true
		),
	);

	public function convert($r)
	{
		$dec = 0;

		for ($t = strlen($r)-1, $c; $t >= 0; $t--, $sub=0)
		{
			$cur = $r[$t];
			$dec += $this->map[$cur];

			if($t > 0)
			{
				$lookahead = $r[$t-1];

				if($lookahead !== $cur && $this->rules[$lookahead]['prefix'] === true && $this->map[$lookahead] < $this->map[$cur])
				{
					$dec -= $this->map[$lookahead];
					$t--;
				}
			}
		}

		return $dec;
	}
}