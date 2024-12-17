<?php 

    require_once __DIR__ . "/Entity/Food.php";
    require_once __DIR__ . "/Entity/Drink.php";
    require_once __DIR__ . "/Repository/FoodRepository.php";
    require_once __DIR__ . "/Repository/DrinkRepository.php";
    require_once __DIR__ . "/Service/FoodService.php";
    require_once __DIR__ . "/Service/DrinkService.php";
    require_once __DIR__ . "/View/FoodView.php";
    require_once __DIR__ . "/Helper/InputHelper.php";
    require_once __DIR__ . "/Helper/CheckHelper.php";

    use Repository\FoodRepositoryImpl;
    use Repository\DrinkRepositoryImpl;
    use Service\FoodServiceImpl;
    use Serive\DrinkServiceImpl;
    use View\FoodView;
    use Helper\InputHelper;

    $foodRepository = new FoodRepositoryImpl();
    $foodService = new FoodServiceImpl($foodRepository);
    $foodView = new FoodView($foodService);

    echo "Cafetaria App" . PHP_EOL;

    while(true)
    {
        echo "MENU UTAMA" . PHP_EOL;
        echo "1. Daftar Makanan" . PHP_EOL;
        echo "2. Daftar Minuman" . PHP_EOL;
        echo "3. Pemesanan" . PHP_EOL;
        echo "4. Pembayaran" . PHP_EOL;
        echo "5. Detail" . PHP_EOL;
        echo "x. Keluar" . PHP_EOL;

        $pilihan = InputHelper::input("Pilih");

        if($pilihan == "1")
        {
            $foodView->showFood();
        }else if($pilihan == "2")
        {

        }else if($pilihan == "3")
        {

        }else if($pilihan == "4")
        {

        }else if($pilihan == "5")
        {

        }else if($pilihan == "x")
        {
            break;
        }else 
        {
            echo "Pilihan tidak dimengerti" . PHP_EOL;
        }
    }

    echo "Sampai Jumpa Lagi" . PHP_EOL;