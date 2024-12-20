<?php 

    namespace Helper 
    {
        class RangeHelper
        {
            public static function range(array $items, int $number): bool
            {
                $result = $number <= sizeof($items) && $number > 0 ? true : false;
                return $result;
            }
        }
    }