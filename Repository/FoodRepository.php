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

        class FoodRepositoryImpl implements FoodRepository 
        {
            public array $foods = array();

            public function findAll(): array 
            {
                return $this->foods;
            }

            public function save(Food $food): void 
            {
                $index = sizeof($this->foods) + 1;
                $this->foods[$index] = $food;
            }

            public function remove(int $number): bool 
            {

            }
        }
    }