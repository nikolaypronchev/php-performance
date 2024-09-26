# PHP performance tests & considerations

## Set data structure

PHP does not have built-in support for the "set" data structure. In this section, we will compare the execution time of add/remove operations and memory consumption for different implementations.

|Implementation|`add 10` sec|bytes|`add 1000` sec|bytes|`add 100000` sec|bytes|
|---|---:|---:|---:|---:|---:|---:|
|Associative array|0.00000191|696|0.00005293|41016|0.00579786|5242960
|Ds/Set|0.00001097|680|0.00003386|36968|0.00544500|4718720
|List|0.00000286|376|0.00542498|20536|52.01670194|2101328

|Implementation|`rm 10` sec|bytes|`rm 1000` sec|bytes|`rm 100000` sec|bytes|
|---|---:|---:|---:|---:|---:|---:|
|Associative array|0.00000095|696|0.00003505|41016|0.00876403|5242960
|Ds/Set|0.00000310|-288|0.00005198|-36576|0.00934005|-4718328
|List|0.00000310|56|0.00227213|56|39.06165504|56

The lowest overall memory consumption is demonstrated by a list (an array with ordered numeric indexes). However, this comes at the cost of disproportionately increasing execution time as the number of elements grows. This implementation is not suitable for a "set" data structure with a large number of elements, but it can help save memory when working with small sets.

Ds/Set and associative arrays show comparable results with moderate growth in memory consumption and processing time. It's worth noting that, unlike associative arrays, Ds/Set promptly releases memory when elements are removed. After the garbage collector runs, associative arrays likely release memory as well, but this does not happen immediately. In large sets, this can lead to increased memory usage and potential memory limit overflow.