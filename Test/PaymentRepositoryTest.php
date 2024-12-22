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

    function testFindAllNotEmpty(): void
    {
        $orderRepository = new OrderRepositoryImpl();
        $paymentRepository = new PaymentRepositoryImpl();
        $food = new Food("Mie Goreng", 6000);
        $orderRepository->save(new Order(1, $food->getName(), $food->getPrice(), 1));
        $drink = new Drink("Es Campur", 12000);
        $orderRepository->save(new Order(1, $drink->getName(), $drink->getPrice(), 2));
        $food = new Food("Pastel", 5000);
        $orderRepository->save(new Order(1, $food->getName(), $food->getPrice(), 3));
        $orders = $orderRepository->findAll();
        $orders = array_filter($orders, fn($order)=>$order->getCode() == 1);
        $total = array_sum(array_map(fn($order)=>$order->getSubTotal(), $orders));
        $paymentRepository->save(new Payment(1, $total, 50000));
        $payments = $paymentRepository->findAll();
        var_dump($payments);
    }

    function testSave(): void
    {
        $orderRepository = new OrderRepositoryImpl();
        $paymentRepository = new PaymentRepositoryImpl();
        $food = new Food("Soto Ayam", 12000);
        $orderRepository->save(new Order(1, $food->getName(), $food->getPrice(), 1));
        $drink = new Drink("Es Campur", 12000);
        $orderRepository->save(new Order(1, $drink->getName(), $drink->getPrice(), 2));
        $drink = new Drink("Es Coklat", 12000);
        $orderRepository->save(new Order(2, $drink->getName(), $drink->getPrice(), 2));
        $orders = $orderRepository->findAll();
        $orders = array_filter($orders, fn($order)=>$order->getCode() == 2);
        $total = array_sum(array_map(fn($order)=>$order->getSubTotal(), $orders));
        $paymentRepository->save(new Payment(2, $total, 50000));
        $payments = $paymentRepository->findAll();
        var_dump($payments);
    }

    testFindAllNotEmpty();