<?php

require __DIR__ . "/functions.php";

$arrayAdd = require __DIR__ ."/array/add.php";
$listAdd = require __DIR__ ."/list/add.php";
$setAdd = require __DIR__ ."/set/add.php";

$arrayRemove = require __DIR__ ."/array/remove.php";
$listRemove = require __DIR__ ."/list/remove.php";
$setRemove = require __DIR__ ."/set/remove.php";

$testVolumes = [10, 1000, 100000];

foreach ($testVolumes as $count) {
    $data = random_strings_array($count);

    [$timeElapsed, $memoryAllocated, $array] = measure(fn() => $arrayAdd($data));
    echo "Array add $count: $timeElapsed|$memoryAllocated\n";
    [$timeElapsed, $memoryAllocated, $set] = measure(fn() => $setAdd($data));
    echo "Set add $count: $timeElapsed|$memoryAllocated\n";
    [$timeElapsed, $memoryAllocated, $list] = measure(fn() => $listAdd($data));
    echo "List add $count: $timeElapsed|$memoryAllocated\n";

    $arrayCopy = $array;
    $setCopy = $set->copy();
    $listCopy = $list;

    $remove = $data;
    shuffle($remove);

    [$timeElapsed, $memoryAllocated, $arrayEmpty] = measure(fn() => $arrayRemove($arrayCopy, $remove));
    echo "Array remove $count: $timeElapsed|$memoryAllocated\n";
    [$timeElapsed, $memoryAllocated, $setEmpty] = measure(fn() => $setRemove($setCopy, $remove));
    echo "Set remove $count: $timeElapsed|$memoryAllocated\n";
    [$timeElapsed, $memoryAllocated, $listEmpty] = measure(fn() => $listRemove($listCopy, $remove));
    echo "List remove $count: $timeElapsed|$memoryAllocated\n";
}