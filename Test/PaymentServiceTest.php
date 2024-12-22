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

    function testShowPaymentNotEmpty(): void
    {
        $orderRepository = new OrderRepositoryImpl();
        $paymentRepository = new PaymentRepositoryImpl();
        $paymentService = new PaymentServiceImpl($paymentRepository);
        $food = new Food("Mie Goreng", 6000);
        $orderRepository->save(new Order(1, $food->getName(), $food->getPrice(), 1));
        $food = new Food("Soto Ayam", 12000);
        $orderRepository->save(new Order(1, $food->getName(), $food->getPrice(), 1));
        $drink = new Drink("Es Campur", 12000);
        $orderRepository->save(new Order(2, $drink->getName(), $drink->getPrice(), 2));
        $orders = $orderRepository->findAll();
        $orders = array_filter($orders, fn($order)=>$order->getCode() == 1);
        $total = array_sum(array_map(fn($order)=>$order->getSubTotal(), $orders));
        $paymentRepository->payments[1] = new Payment(1, $total, 50000);
        $paymentService->showPayment();
    }

    function testAddPayment(): void
    {
        $orderRepository = new OrderRepositoryImpl();
        $paymentRepository = new PaymentRepositoryImpl();
        $paymentService = new PaymentServiceImpl($paymentRepository);
        $food = new Food("Mie Goreng", 6000);
        $orderRepository->save(new Order(1, $food->getName(), $food->getPrice(), 1));
        $food = new Food("Soto Ayam", 12000);
        $orderRepository->save(new Order(1, $food->getName(), $food->getPrice(), 1));
        $drink = new Drink("Es Campur", 12000);
        $orderRepository->save(new Order(1, $drink->getName(), $drink->getPrice(), 2));
        $orders = $orderRepository->findAll();
        $orders = array_filter($orders, fn($order)=>$order->getCode() == 1);
        $total = array_sum(array_map(fn($order)=>$order->getSubTotal(), $orders));
        $paymentService->addPayment(1, $total, 50000);
        $paymentService->showPayment();
    }

    function testGetPayment(): void
    {
        $orderRepository = new OrderRepositoryImpl();
        $paymentRepository = new PaymentRepositoryImpl();
        $paymentService = new PaymentServiceImpl($paymentRepository);
        $food = new Food("Mie Goreng", 6000);
        $orderRepository->save(new Order(1, $food->getName(), $food->getPrice(), 1));
        $food = new Food("Soto Ayam", 12000);
        $orderRepository->save(new Order(1, $food->getName(), $food->getPrice(), 1));
        $drink = new Drink("Es Campur", 12000);
        $orderRepository->save(new Order(1, $drink->getName(), $drink->getPrice(), 2));
        $orders = $orderRepository->findAll();
        $orders = array_filter($orders, fn($order)=>$order->getCode() == 1);
        $total = array_sum(array_map(fn($order)=>$order->getSubTotal(), $orders));
        $paymentService->addPayment(1, $total, 50000);
        $payments = $paymentService->getPayment();
        var_dump($payments);
    }

    testGetPayment();
