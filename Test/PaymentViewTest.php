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
    require_once __DIR__ . "/../Helper/FindHelper.php";
    require_once __DIR__ . "/../Helper/InputHelper.php";
    require_once __DIR__ . "/../Helper/PayHelper.php";

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

    function testViewShowPaymentNotEmpty(): void
    {
        $food = new Food("Mie Goreng", 6000);
        $orderRepository = new OrderRepositoryImpl();
        $orderRepository->save(new Order(1, $food->getName(), $food->getPrice(), 1));
        $food = new Food("Batagor", 8000);
        $orderRepository->save(new Order(1, $food->getName(), $food->getPrice(), 1));
        $drink = new Drink("Es Campur", 12000);
        $orderRepository->save(new Order(1, $drink->getName(), $drink->getPrice(), 2));
        $orderService = new OrderServiceImpl($orderRepository);
        $paymentRepository = new PaymentRepositoryImpl();
        $paymentService = new PaymentServiceImpl($paymentRepository);
        $paymentView = new PaymentView($paymentService, $orderService);
        $paymentView->showPayment();
    }

    function testViewAddPayment(): void
    {
        $food = new Food("Mie Goreng", 6000);
        $orderRepository = new OrderRepositoryImpl();
        $orderRepository->save(new Order(1, $food->getName(), $food->getPrice(), 1));
        $food = new Food("Batagor", 8000);
        $orderRepository->save(new Order(1, $food->getName(), $food->getPrice(), 1));
        $drink = new Drink("Es Campur", 12000);
        $orderRepository->save(new Order(1, $drink->getName(), $drink->getPrice(), 2));
        $orderService = new OrderServiceImpl($orderRepository);
        $paymentRepository = new PaymentRepositoryImpl();
        $paymentService = new PaymentServiceImpl($paymentRepository);
        $paymentView = new PaymentView($paymentService, $orderService);
        $orderService->showOrder();
        $paymentView->addPayment();
    }

    testViewAddPayment();