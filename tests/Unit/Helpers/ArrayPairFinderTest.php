<?php


namespace Helpers;

use App\Helpers\ArrayPairFinder;
use PHPUnit\Framework\TestCase;

class ArrayPairFinderTest extends TestCase
{
    public function test_findPair(): void
    {
        $array = [1, 2, 3, 4, 5];
        $target = 8;
        $exepted = [4, 5];
        $result = ArrayPairFinder::findPair($array, $target);
        
        $this->assertEquals($exepted, $result);
    }
    
    public function test_findPair_unordered_numbers(): void
    {
        $array = [2, 1, 4, 3, 5];
        $target = 8;
        $exepted = [4, 5];
        $result = ArrayPairFinder::findPair($array, $target);
        
        $this->assertEquals($exepted, $result);
    }
}
