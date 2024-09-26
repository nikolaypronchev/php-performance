<?php

return function($set, $remove) {
	foreach ($remove as $value) {
		$set->remove($value);
	}

	return $set;
};