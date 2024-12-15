<?php 

    namespace Service 
    {
        interface FoodService 
        {
            public function showFood(): void;
            public function addFood(string $name, int $price): void;
            public function getFood(): array;
            public function removeFood(int $number): bool;
        }
    }