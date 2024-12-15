<?php 

    namespace Repository 
    {
        use Entity\Food;

        interface FoodRepository 
        {
            public function findAll(): array;
            public function save(Food $food): void;
            public function remove(int $number): bool;
        }
    }