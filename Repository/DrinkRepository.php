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
            private array $drinks = array();

            public function findAll(): array
            {
                return $this->drinks;
            }

            public function save(Drink $drink): void
            {
                $index = sizeof($this->drinks) + 1;
                $this->drinks[$index] = $drink;
            }

            public function remove(int $number): bool 
            {
                $elements = sizeof($this->drinks);

                if($number <= 0)
                {
                    return false;
                }

                if($elements < $number)
                {
                    return false;
                }

                for($index = $number; $index < sizeof($this->drinks); $index++)
                {
                    $this->drinks[$index]->setName($this->drinks[$index+1]->getName());
                    $this->drinks[$index]->setPrice($this->drinks[$index+1]->getPrice());
                }

                unset($this->drinks[sizeof($this->drinks)]);
                return true;
            }
        }
    }