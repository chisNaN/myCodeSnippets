<?php

class HyphenSelfProp
{
	protected $protected_var;

	public $public_var;

	private $private_var, $other_private_var;

	public function __construct()
	{
	 	$i = 0;
		foreach(get_object_vars($this) as $k => $v):

			$i++;

			if(!in_array($k, ['private_var']))
			{
				$this->{$k} = $i;
			}
			
		endforeach;
	}
}

$h = new HyphenSelfProp;

var_dump($h);