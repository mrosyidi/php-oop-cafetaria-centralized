<?php 

    namespace View 
    {
        use Service\FoodService;
        use Helper\InputHelper;

        class FoodView 
        {
            private FoodService $foodService;

            public function __construct(FoodService $foodService)
            {
                $this->foodService = $foodService;
            }

            function showFood(): void 
            {
                while(true)
                {
                    $this->foodService->showFood();

                    echo "Menu Makanan" . PHP_EOL;
                    echo "1. Tambah Makanan" . PHP_EOL;
                    echo "2. Hapus Makanan" . PHP_EOL;
                    echo "x. Kembali" . PHP_EOL;

                    $pilihan = InputHelper::input("Pilih");

                    if($pilihan == "1")
                    {

                    }else if($pilihan == "2")
                    {

                    }else if($pilihan == "x")
                    {
                        break;
                    }
                }
            }

            function addFood(): void 
            {

            }

            function removeFood(): void 
            {
                
            }
        }
    }