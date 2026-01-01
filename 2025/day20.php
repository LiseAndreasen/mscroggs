<?php

// n = 1 will contribute nothing useful
// n = 33 would be too big squared, stop there
for($n=2;$n<33;$n++) {
	$k = 2;
	$perfect = pow($n, $k);
	while($perfect < 1029) {
		if(99 < $perfect) {
			$perfect_powers[$perfect] = $perfect;
		}
		$k++;
		$perfect = pow($n, $k);
	}
}

sort($perfect_powers);
printf("%d perfect powers found\n", sizeof($perfect_powers));

$prev = 0;
foreach($perfect_powers as $pp1) {
	foreach($perfect_powers as $pp2) {
		if($pp2 - $pp1 == 29) {
			printf("Hit! %d - %d = 29\n", $pp2, $pp1);
		}
	}
}

?>
