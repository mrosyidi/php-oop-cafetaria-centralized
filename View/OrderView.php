<?php 

    namespace View 
    {
        use Service\OrderService;
        use Service\FoodService;
        use Service\DrinkService;
        use Helper\InputHelper;

        class OrderView
        {
            private OrderService $orderService;
            private FoodService $foodService;
            private DrinkService $drinkService;

            public function __construct(OrderService $orderService, FoodService $foodService, DrinkService $drinkService)
            {
                $this->orderService = $orderService;
                $this->foodService = $foodService;
                $this->drinkService = $drinkService;
            }

            public function showOrder(): void 
            {
                while(true)
                {
                    $this->orderService->showOrder();

                    echo "Menu Pemesanan" . PHP_EOL;
                    echo "1. Pesan Makanan" . PHP_EOL;
                    echo "2. Pesan Minuman" . PHP_EOL;
                    echo "x. Kembali" . PHP_EOL;

                    $pilihan = InputHelper::input("Pilih");

                    if($pilihan == "1")
                    {

                    }else if($pilihan == "2")
                    {
                        
                    }else if($pilihan == "x")
                    {
                        break;
                    }else
                    {
                        echo "Pilihan tidak dimengerti" . PHP_EOL;
                    }
                }
            }

            public function addOrder(int $numberOrder, bool $exit): void 
            {

            }
        }
    }