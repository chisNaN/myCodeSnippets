<?php //this code snippet checks if current value iteration has same content of previous one
// by using just 2 last concatenated values

$concat_k = $concat_v = '';

foreach($_SERVER as $k => $v):

	$concat_v .= $v;
	$concat_k .= $k;

	//the current concat elem as searched, 0 as departure then full concat elem minus the ONLY current value length string
	$s_previous_concat_elem = substr($concat_v, 0, strlen($concat_v) - strlen($v));
	$s_previous_concat_k = substr($concat_k, 0, strlen($concat_k) - strlen($k));

	if($s_previous_concat_elem === $v)
	{
		echo '<br>'.$s_previous_concat_elem.' === '.$v;
		echo '<br>(previous iteration) '.$s_previous_concat_k.' has same content as (current one) '.$k;
	}

	$concat_v = $v;     //has to occur foreach iteration
	$concat_k = $k;

endforeach;

echo '<hr/>';

var_dump($_SERVER);