<?php 

    require_once __DIR__ . "/../Entity/Food.php";
    require_once __DIR__ . "/../Entity/Drink.php";
    require_once __DIR__ . "/../Entity/Order.php";
    require_once __DIR__ . "/../Entity/Payment.php";
    require_once __DIR__ . "/../Entity/Detail.php";
    require_once __DIR__ . "/../Repository/OrderRepository.php";
    require_once __DIR__ . "/../Repository/PaymentRepository.php";
    require_once __DIR__ . "/../Repository/DetailRepository.php";
    require_once __DIR__ . "/../Service/DetailService.php";

    use Entity\Food;
    use Entity\Drink;
    use Entity\Order;
    use Entity\Payment;
    use Entity\Detail;
    use Repository\OrderRepositoryImpl;
    use Repository\PaymentRepositoryImpl;
    use Repository\DetailRepositoryImpl;
    use Service\DetailServiceImpl;

    function testFindAllEmpty(): void 
    {
        $detailRepository = new DetailRepositoryImpl();
        $details = $detailRepository->findAll();
        var_dump($details);
    }

    function testFindAllNotEmpty(): void 
    {
        $orderRepository = new OrderRepositoryImpl();
        $paymentRepository = new PaymentRepositoryImpl();
        $detailRepository = new DetailRepositoryImpl();
        $food = new Food("Mie Goreng", 6000);
        $orderRepository->save(new Order(1, $food->getName(), $food->getPrice(), 1));
        $detailRepository->save(new Detail(1, $food->getName(), $food->getPrice(), 1));
        $drink = new Drink("Es Campur", 12000);
        $orderRepository->save(new Order(1, $drink->getName(), $drink->getPrice(), 2));
        $detailRepository->save(new Detail(1, $drink->getName(), $drink->getPrice(), 2));
        $food = new Food("Pastel", 5000);
        $orderRepository->save(new Order(1, $food->getName(), $food->getPrice(), 3));
        $detailRepository->save(new Detail(1, $food->getName(), $food->getPrice(), 3));
        $orders = $orderRepository->findAll();
        $orders = array_filter($orders, fn($order)=>$order->getCode() == 1);
        $total = array_sum(array_map(fn($order)=>$order->getSubTotal(), $orders));
        $paymentRepository->save(new Payment(1, $total, 50000));
        $details = $detailRepository->findAll();
        var_dump($details);
    }

    function testSave(): void 
    {
        $orderRepository = new OrderRepositoryImpl();
        $paymentRepository = new PaymentRepositoryImpl();
        $detailRepository = new DetailRepositoryImpl();
        $detailService = new DetailServiceImpl($detailRepository);
        $food = new Food("Mie Goreng", 6000);
        $orderRepository->save(new Order(1, $food->getName(), $food->getPrice(), 1));
        $detailRepository->save(new Detail(1, $food->getName(), $food->getPrice(), 1));
        $drink = new Drink("Es Campur", 12000);
        $orderRepository->save(new Order(1, $drink->getName(), $drink->getPrice(), 2));
        $detailRepository->save(new Detail(1, $drink->getName(), $drink->getPrice(), 2));
        $food = new Food("Pastel", 5000);
        $orderRepository->save(new Order(2, $food->getName(), $food->getPrice(), 3));
        $detailRepository->save(new Detail(2, $food->getName(), $food->getPrice(), 3));
        $orders = $orderRepository->findAll();
        $orders = array_filter($orders, fn($order)=>$order->getCode() == 1);
        $total = array_sum(array_map(fn($order)=>$order->getSubTotal(), $orders));
        $paymentRepository->save(new Payment(1, $total, 50000));
        $detailService->showDetail(2);
    }

    testFindAllNotEmpty();