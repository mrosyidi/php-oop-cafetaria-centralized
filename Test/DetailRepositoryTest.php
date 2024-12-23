<?php 

    require_once __DIR__ . "/../Entity/Food.php";
    require_once __DIR__ . "/../Entity/Drink.php";
    require_once __DIR__ . "/../Entity/Order.php";
    require_once __DIR__ . "/../Entity/Payment.php";
    require_once __DIR__ . "/../Entity/Detail.php";
    require_once __DIR__ . "/../Repository/OrderRepository.php";
    require_once __DIR__ . "/../Repository/PaymentRepository.php";
    require_once __DIR__ . "/../Repository/DetailRepository.php";
    require_once __DIR__ . "/../Repository/DetailRepository.php";

    use Entity\Food;
    use Entity\Drink;
    use Entity\Order;
    use Entity\Payment;
    use Entity\Detail;
    use Repository\OrderRepositoryImpl;
    use Repository\PaymentRepositoryImpl;
    use Repository\DetailRepositoryImpl;

    function testFindAllEmpty(): void 
    {
        $detailRepository = new DetailRepositoryImpl();
        $details = $detailRepository->findAll();
        var_dump($details);
    }

    testFindAllEmpty();