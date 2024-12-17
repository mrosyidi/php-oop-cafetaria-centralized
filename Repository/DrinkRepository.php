<?php 

    namespace Repository 
    {
        use Entity\Drink;

        interface DrinkRepository
        {
          public function findAll(): array;
          public function save(Drink $drink): void;
          public function remove(int $number): bool;
        }

        class DrinkRepositoryImpl implements DrinkRepository
        {
            public array $drinks = array();

            public function findAll(): array
            {
                return $this->drinks;
            }

            public function save(Drink $drink): void
            {

            }

            public function remove(int $number): bool 
            {

            }
        }
    }