<?php 

    require_once __DIR__ . "/../Entity/Food.php";
    require_once __DIR__ . "/../Entity/Drink.php";
    require_once __DIR__ . "/../Entity/Order.php";
    require_once __DIR__ . "/../Entity/Payment.php";
    require_once __DIR__ . "/../Repository/OrderRepository.php";
    require_once __DIR__ . "/../Repository/PaymentRepository.php";
    require_once __DIR__ . "/../Service/OrderService.php";
    require_once __DIR__ . "/../Service/PaymentService.php";

    use Entity\Food;
    use Entity\Drink;
    use Entity\Order;
    use Entity\Payment;
    use Repository\OrderRepositoryImpl;
    use Repository\PaymentRepositoryImpl;
    use Service\OrderServiceImpl;
    use Service\PaymentServiceImpl;

    function testShowPaymentEmpty(): void
    {
        $paymentRepository = new PaymentRepositoryImpl();
        $paymentService = new PaymentServiceImpl($paymentRepository);
        $paymentService->showPayment();
    }

    testShowPaymentEmpty();