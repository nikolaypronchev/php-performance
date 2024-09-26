<?php

return function($set, $remove) {
	foreach ($remove as $value) {
		unset($set[$value]);
	}

	return $set;
};