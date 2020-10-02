<?php 

	$s = "Hello my name is Aniket Patil";
	echo strlen($s).'<br>';
	print_r (explode(" ",$s)).'\n';
	echo '<br>'.strrev($s).'<br>';
	echo strtolower($s).'<br>';
	echo strtoupper($s).'<br>';
	$str = "Hmrrb thjk jk nhn";
    $from = "rbmnjk";
    $to = "loepis";
    echo strtr($str, $from, $to).'<br>';

?>