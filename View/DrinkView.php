<?php 

    namespace View 
    {
        use Service\DrinkService;
        use Helper\InputHelper;

        class DrinkView
        {
            private DrinkService $drinkService;

            public function __construct(DrinkService $drinkService)
            {
                $this->drinkService = $drinkService;
            }

            public function showDrink(): void
            {
                while(true)
                {
                    $this->drinkService->showDrink();

                    echo "Menu Minuman" . PHP_EOL;
                    echo "1. Tambah Minuman" . PHP_EOL;
                    echo "2. Hapus Minuman" . PHP_EOL;
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

            public function addDrink(): void 
            {

            }

            public function removeDrink(): void 
            {

            }
        }
    }