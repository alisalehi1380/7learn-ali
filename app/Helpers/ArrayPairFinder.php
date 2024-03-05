<?php

namespace App\Helpers;

class ArrayPairFinder
{
    public static function findPair($numbers, $target): array
    {
        foreach ($numbers as $key1 => $num1) {
            foreach ($numbers as $key2 => $num2) {
                if ($key1 != $key2 && ($num1 + $num2) > $target) {
                    return [$num1, $num2];
                }
            }
        }
    }
}
