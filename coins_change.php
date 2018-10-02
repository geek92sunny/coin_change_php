<?php

/**
 * @param int total money we want to count changes of
 * @param array all denominations coin
 * @return int total changes possible
 */
function count_change ($money, $coins) {
	// We reached to final solution
	if ($money == 0)	
		return 1;

	// All coins finished, change not possible
	if (count($coins) == 0 || $money < 0) {
		return 0;
	}

	$coin = array_slice($coins, -1)[0];
	// Including last coin in solution
	$include = count_change($money - $coin, $coins);

	array_pop($coins);
	// Excluding last coin from solution
	$exclude = count_change($money, $coins);

	return $include + $exclude;
}
