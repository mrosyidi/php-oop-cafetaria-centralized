<?php 

    namespace Helper
    {
        class DataHelper
        {
            public static function data(array $items, int $index): array
            {
                return [
                    "name" => $items[$index]->getName(),
                    "price" => $items[$index]->getPrice()
                ];
            }
        }
    }