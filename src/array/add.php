<?php

return function($data) {
	$set = [];

	foreach ($data as $value) {
		$set[$value] = null;
	}

	return $set;
};
