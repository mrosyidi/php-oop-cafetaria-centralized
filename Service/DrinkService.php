<?php 

    namespace Service 
    {
        use Entity\Drink;
        use Repository\DrinkRepository;

        interface DrinkService
        {
            public function showDrink(): void;
            public function addDrink(string $name, int $price): void;
            public function getDrink(): array;
            public function removeDrink(int $number): bool;
        }

        class DrinkServiceImpl implements DrinkService
        {
            private DrinkRepository $drinkRepository;

            public function __construct(DrinkRepository $drinkRepository)
            {
                $this->drinkRepository = $drinkRepository;
            }

            public function showDrink(): void
            {
                echo "DAFTAR MINUMAN" . PHP_EOL;

                $drinks = $this->drinkRepository->findAll();

                if(empty($drinks))
                {
                    echo "Tidak ada daftar minuman" . PHP_EOL;
                }else
                {
                    foreach($drinks as $number => $drink)
                    {
                        echo "$number. " . $drink->getName() . "  Rp." . $drink->getPrice() . PHP_EOL;
                    }
                }
            }

            public function addDrink(string $name, int $price): void
            {

            }

            public function getDrink(): array
            {

            }

            public function removeDrink(int $number): bool
            {

            }
        }
    }