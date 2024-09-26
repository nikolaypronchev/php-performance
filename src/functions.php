<?php

function measure(callable $callback): array
{
    $start = microtime(true);
    $allocatedBefore = memory_get_usage();

    $result = call_user_func($callback);

    $allocatedAfter = memory_get_usage();
    $end = microtime(true);

    $elapsed = number_format($end - $start, 8);

    return [$elapsed, $allocatedAfter - $allocatedBefore, $result];
}

function random_strings_array(int $length): array
{
    $result = [];
    for ($i = 0; $i < $length; $i++) {
        $result[] = uniqid();
    }
    return $result;
}