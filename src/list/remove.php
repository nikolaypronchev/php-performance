<?php

return function($set, $remove) {
	foreach ($remove as $rmValue) {
        $index = array_search($rmValue, $set, true);
        false !== $index && array_splice($set, $index,1);
	}

    return $set;
};