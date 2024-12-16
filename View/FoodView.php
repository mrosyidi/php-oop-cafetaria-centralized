<?php 

    namespace View 
    {
        use Service\FoodService;
        use Helper\InputHelper;
        use Helper\CheckHelper;

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
                        $this->addFood();
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
                $foods = $this->foodService->getFood();

                echo "MENAMBAH MAKANAN" . PHP_EOL;

                $name = InputHelper::input("Nama makanan (x untuk batal)");

                if($name == "x")
                {
                    echo "Batal menambah makanan" . PHP_EOL;
                }else
                {
                    $price = InputHelper::input("Harga makanan (x untuk batal)");

                    if($price == "x")
                    {
                        echo "Batal menambah makanan" . PHP_EOL;
                    }else if(!is_numeric($price))
                    {
                        echo "Gagal menambah makanan, harga makanan harus bilangan" . PHP_EOL;
                    }else if($price <= 0)
                    {
                        echo "Gagal menambah makanan, harga harus bilangan positif" . PHP_EOL;
                    }else if(CheckHelper::check($foods, $name))
                    {
                        echo "Gagal menambah makanan, nama makanan sudah ada" . PHP_EOL;
                    }else
                    {
                        $this->foodService->addFood($name, $price);
                    }
                }
            }

            function removeFood(): void 
            {
                echo "MENGHAPUS MAKANAN" . PHP_EOL;

                $number = InputHelper::input("Nomor makanan (x untuk batal)");

                if($number == "x")
                {
                    echo "Batal menghapus makanan" . PHP_EOL;
                }else if(!is_numeric($number))
                {
                    echo "Gagal menghapus makanan, nomor harus bilangan" . PHP_EOL;
                }else
                {
                    $success = $this->foodService->removeFood($number);

                    if($success)
                    {
                        echo "Sukses menghapus makanan nomor $number" . PHP_EOL;
                    }else
                    {
                        echo "Gagal menghapus makanan nomor $number" . PHP_EOL;
                    }
                }
            }
        }
    }