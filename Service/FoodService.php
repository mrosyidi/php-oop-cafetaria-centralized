<?php 

    namespace Service 
    {
        use Entity\Food;
        use Repository\FoodRepository;

        interface FoodService 
        {
            public function showFood(): void;
            public function addFood(string $name, int $price): void;
            public function getFood(): array;
            public function removeFood(int $number): bool;
        }

        class FoodServiceImpl implements FoodService 
        {
            private FoodRepository $foodRepository;

            public function __construct(FoodRepository $foodRepository)
            {
                $this->foodRepository = $foodRepository;
            }

            public function showFood(): void 
            {
                echo "DAFTAR MAKANAN" . PHP_EOL;

                $foods = $this->foodRepository->findAll();

                if(empty($foods))
                {
                    echo "Tidak ada daftar makanan" . PHP_EOL;
                }else
                {
                    foreach($foods as $number => $food)
                    {
                        echo "$number. " . $food->getName() . "  Rp." . $food->getPrice() . PHP_EOL;
                    }
                }
            }

            public function addFood(string $name, int $price): void 
            {
                $food = new Food($name, $price);
                $this->foodRepository->save($food);
            }

            public function getFood(): array 
            {
                $foods = $this->foodRepository->findAll();
                return $foods;
            }

            public function removeFood(int $number): bool 
            {

            }
        }
    }