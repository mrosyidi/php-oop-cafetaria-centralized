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
            private array $foods = array();

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
                $elements = sizeof($this->foods);

                if($number <= 0)
                {
                    return false;
                }

                if($elements < $number)
                {
                    return false;
                }

                for($index = $number; $index < sizeof($this->foods); $index++)
                {
                    $this->foods[$index]->setName($this->foods[$index+1]->getName());
                    $this->foods[$index]->setPrice($this->foods[$index+1]->getPrice());
                }

                unset($this->foods[sizeof($this->foods)]);
                return true;
            }
        }
    }