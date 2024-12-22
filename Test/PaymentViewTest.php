<?php 

    require_once __DIR__ . "/../Entity/Food.php";
    require_once __DIR__ . "/../Entity/Drink.php";
    require_once __DIR__ . "/../Entity/Order.php";
    require_once __DIR__ . "/../Entity/Payment.php";
    require_once __DIR__ . "/../Repository/OrderRepository.php";
    require_once __DIR__ . "/../Repository/PaymentRepository.php";
    require_once __DIR__ . "/../Service/OrderService.php";
    require_once __DIR__ . "/../Service/PaymentService.php";
    require_once __DIR__ . "/../View/PaymentView.php";
    require_once __DIR__ . "/../Helper/InputHelper.php";

    use Entity\Food;
    use Entity\Drink;
    use Entity\Order;
    use Repository\OrderRepositoryImpl;
    use Repository\PaymentRepositoryImpl;
    use Service\OrderServiceImpl;
    use Service\PaymentServiceImpl;
    use View\PaymentView;

    function testViewShowPaymentEmpty(): void
    {
        $orderRepository = new OrderRepositoryImpl();
        $orderService = new OrderServiceImpl($orderRepository);
        $paymentRepository = new PaymentRepositoryImpl();
        $paymentService = new PaymentServiceImpl($paymentRepository);
        $paymentView = new PaymentView($paymentService, $orderService);
        $paymentView->showPayment();
    }

    testViewShowPaymentEmpty();