<?php

// https://www.geeksforgeeks.org/php/php-program-to-find-all-factors-of-a-number/

function find_factors($num, $i = 1, $factors = []) {
    if ($i > sqrt($num)) {
        sort($factors);
        return $factors;
    }

    if ($num % $i == 0) {
        $factors[] = $i;
        if ($i != $num / $i) {
            $factors[] = $num / $i;
        }
    }

    return find_factors($num, $i + 1, $factors);
}

for($i=100;$i<=130;$i++) {
	$factors = find_factors($i);
	foreach($factors as $key => $factor) {
		if($factor % 2 == 0) {
			unset($factors[$key]);
		}
	}
	$no_factors = sizeof($factors);

	if(array_search($no_factors, $factors) !== false) {
		printf("Hit! %d\n", $i);
	}
}

?>
