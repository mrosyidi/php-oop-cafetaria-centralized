<?php 

    namespace View 
    {
        use Service\OrderService;
        use Service\FoodService;
        use Service\DrinkService;
        use Helper\CodeHelper;
        use Helper\DataHelper;
        use Helper\InputHelper;
        use Helper\RangeHelper;

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
                $orders = $this->orderService->getOrder();

                if($numberOrder == 1)
                {
                    $order = "makanan";
                    $items = $this->foodService->getFood();
                    $this->foodService->showFood();
                }else if($numberOrder == 2)
                {
                    $order = "minuman";
                    $items = $this->drinkService->getDrink();
                    $this->drinkService->showDrink();
                }

                echo "MENAMBAH PESANAN" . PHP_EOL;

                $number = InputHelper::input("Nomor $order (x untuk batal)");

                if($number == "x")
                {
                    echo "Batal menambah pesanan" . PHP_EOL;
                }else if(!is_numeric($number))
                {
                    echo "Gagal menambah pesanan, nomor $order harus bilangan" . PHP_EOL;
                }else if(!RangeHelper::range($items, $number))
                {
                    echo "Gagal menambah pesanan, tidak ada $order dengan nomor $number" . PHP_EOL;
                }else
                {
                    $qty = InputHelper::input("Jumlah (x untuk batal)");

                    if($qty == "x")
                    {
                        echo "Batal menambah $order" . PHP_EOL;
                    }else if(!is_numeric($qty))
                    {
                        echo "Gagal menambah makanan, nomor $order harus bilangan" . PHP_EOL;
                    }else if($qty <= 0)
                    {
                        echo "Gagal menambah makanan, jumlah $order minimal satu" . PHP_EOL;
                    }else
                    {
                        $code = CodeHelper::code($orders, $exit);
                        $item = DataHelper::data($items, $number);
                        $this->orderService->addOrder($code, $item["name"], $item["price"], $qty);
                    }
                }
            }
        }
    }