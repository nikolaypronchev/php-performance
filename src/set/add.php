<?php

return function($data) {
	$set = new \Ds\Set();

	foreach ($data as $value) {
		$set->add($value);
	}

	return $set;
};