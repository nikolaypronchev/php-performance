<?php

return function($data) {
	$set = [];

	foreach ($data as $value) {
		!in_array($value,$set) && $set[] = $value;
	}

	return $set;
};