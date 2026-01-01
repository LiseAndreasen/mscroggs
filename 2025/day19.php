<?php

// so_far: array of squares used
// e.g. [1, 2] would mean the squares 1 and 2^2, i.e. 4
function find_squares($left, $so_far) {
	global $squares;
	
	$so_far_digits = "";
	foreach($so_far as $num) {
		$so_far_digits .= $squares[$num];
	}

	if($left == 0) {
		if(strlen($so_far_digits) == 9) {
			sort($so_far);
			printf("Solution: %s\n", implode(",", $so_far));
			return 1;
		} else {
			return 0;
		}
	}
	
	foreach($squares as $num => $square) {
		if(array_search($num, $so_far) !== false) {
			// this number has already been used
			continue;
		}
		
		$digits = str_split($square);
		foreach($digits as $digit) {
			if(strpos($so_far_digits, $digit) !== false) {
				// this number would give a duplicate digit
				continue 2;
			}
		}
		
		$so_far_new = $so_far;
		$so_far_new[] = $num;
		find_squares($left - 1, $so_far_new);
	}
}

// produce squares
for($i=1;$i<=31;$i++) {
	$this_square = $i * $i;
	
	// eliminate squares with double digits
	// 2 digit numbers
	if(9 < $this_square && $this_square < 100) {
		if($this_square % 10 == floor($this_square / 10)) {
			continue;
		}
	}
	// 3 digit numbers
	if(99 < $this_square) {
		[$d1, $d2, $d3] = str_split($this_square);
		if($d1 == $d2 || $d1 == $d3 || $d2 == $d3) {
			continue;
		}
	}
	
	$squares[$i] = $this_square;	
}

// find 5 squares
find_squares(5, []);

?>
