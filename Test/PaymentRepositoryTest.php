<?php 

    require_once __DIR__ . "/../Entity/Food.php";
    require_once __DIR__ . "/../Entity/Drink.php";
    require_once __DIR__ . "/../Entity/Order.php";
    require_once __DIR__ . "/../Entity/Payment.php";
    require_once __DIR__ . "/../Repository/OrderRepository.php";
    require_once __DIR__ . "/../Repository/PaymentRepository.php";

    use Entity\Food;
    use Entity\Drink;
    use Entity\Order;
    use Entity\Payment;
    use Repository\OrderRepositoryImpl;
    use Repository\PaymentRepositoryImpl;

    function testFindAllEmpty(): void
    {
        $paymentRepository = new PaymentRepositoryImpl();
        $payments = $paymentRepository->findAll();
        var_dump($payments);
    }

    testFindAllEmpty();