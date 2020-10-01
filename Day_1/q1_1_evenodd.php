<?php 

	$num = array(11, 23, 72, 44);
	foreach ($num as $x) {
		if($x % 2 != 0)
			echo "The number $x is an odd number <br>";
		else
			echo "The number $x is an even number <br>";
	}

?>