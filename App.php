<?php 

    require_once __DIR__ . "/Entity/Food.php";
    require_once __DIR__ . "/Entity/Drink.php";
    require_once __DIR__ . "/Entity/Order.php";
    require_once __DIR__ . "/Entity/Payment.php";
    require_once __DIR__ . "/Entity/Detail.php";
    require_once __DIR__ . "/Repository/FoodRepository.php";
    require_once __DIR__ . "/Repository/DrinkRepository.php";
    require_once __DIR__ . "/Repository/OrderRepository.php";
    require_once __DIR__ . "/Repository/PaymentRepository.php";
    require_once __DIR__ . "/Repository/DetailRepository.php";
    require_once __DIR__ . "/Service/FoodService.php";
    require_once __DIR__ . "/Service/DrinkService.php";
    require_once __DIR__ . "/Service/OrderService.php";
    require_once __DIR__ . "/Service/PaymentService.php";
    require_once __DIR__ . "/Service/DetailService.php";
    require_once __DIR__ . "/View/FoodView.php";
    require_once __DIR__ . "/View/DrinkView.php";
    require_once __DIR__ . "/View/OrderView.php";
    require_once __DIR__ . "/View/PaymentView.php";
    require_once __DIR__ . "/View/DetailView.php";
    require_once __DIR__ . "/Helper/CheckHelper.php";
    require_once __DIR__ . "/Helper/CodeHelper.php";
    require_once __DIR__ . "/Helper/DataHelper.php";
    require_once __DIR__ . "/Helper/DuplicateHelper.php";
    require_once __DIR__ . "/Helper/FindHelper.php";
    require_once __DIR__ . "/Helper/InputHelper.php";
    require_once __DIR__ . "/Helper/PayHelper.php";
    require_once __DIR__ . "/Helper/RangeHelper.php";

    use Repository\FoodRepositoryImpl;
    use Repository\DrinkRepositoryImpl;
    use Repository\OrderRepositoryImpl;
    use Repository\PaymentRepositoryImpl;
    use Repository\DetailRepositoryImpl;
    use Service\FoodServiceImpl;
    use Service\DrinkServiceImpl;
    use Service\OrderServiceImpl;
    use Service\PaymentServiceImpl;
    use Service\DetailServiceImpl;
    use View\FoodView;
    use View\DrinkView;
    use View\OrderView;
    use View\PaymentView;
    use View\DetailView;
    use Helper\InputHelper;

    $foodRepository = new FoodRepositoryImpl();
    $drinkRepository = new DrinkRepositoryImpl();
    $orderRepository = new OrderRepositoryImpl();
    $paymentRepository = new PaymentRepositoryImpl();
    $detailRepository = new DetailRepositoryImpl();

    $foodService = new FoodServiceImpl($foodRepository);
    $drinkService = new DrinkServiceImpl($drinkRepository);
    $orderService = new OrderServiceImpl($orderRepository);
    $paymentService = new PaymentServiceImpl($paymentRepository);
    $detailService = new DetailServiceImpl($detailRepository);

    $foodView = new FoodView($foodService);
    $drinkView = new DrinkView($drinkService);
    $orderView = new OrderView($orderService, $foodService, $drinkService, $paymentService);
    $paymentView = new PaymentView($paymentService, $orderService, $detailService);
    $detailView = new DetailView($detailService, $paymentService);

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
            $drinkView->showDrink();
        }else if($pilihan == "3")
        {
            $orderView->showOrder();
        }else if($pilihan == "4")
        {
            $paymentView->showPayment();
        }else if($pilihan == "5")
        {
            $detailView->showDetail();
        }else if($pilihan == "x")
        {
            break;
        }else 
        {
            echo "Pilihan tidak dimengerti" . PHP_EOL;
        }
    }

    echo "Sampai Jumpa Lagi" . PHP_EOL;