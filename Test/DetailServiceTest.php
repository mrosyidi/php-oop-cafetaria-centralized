<?php 

    require_once __DIR__ . "/../Entity/Food.php";
    require_once __DIR__ . "/../Entity/Drink.php";
    require_once __DIR__ . "/../Entity/Order.php";
    require_once __DIR__ . "/../Entity/Payment.php";
    require_once __DIR__ . "/../Entity/Detail.php";
    require_once __DIR__ . "/../Repository/OrderRepository.php";
    require_once __DIR__ . "/../Repository/PaymentRepository.php";
    require_once __DIR__ . "/../Repository/DetailRepository.php";
    require_once __DIR__ . "/../Service/OrderService.php";
    require_once __DIR__ . "/../Service/PaymentService.php";
    require_once __DIR__ . "/../Service/DetailService.php";

    use Entity\Food;
    use Entity\Drink;
    use Entity\Order;
    use Entity\Payment;
    use Entity\Detail;
    use Repository\OrderRepositoryImpl;
    use Repository\PaymentRepositoryImpl;
    use Repository\DetailRepositoryImpl;
    use Service\OrderServiceImpl;
    use Service\PaymentServiceImpl;
    use Service\DetailServiceImpl;

    function testShowDetailEmpty(): void
    {
        $detailRepository = new DetailRepositoryImpl();
        $detailService = new DetailServiceImpl($detailRepository);
        $detailService->showDetail(2);
    }

    function testShowDetailNotEmpty(): void
    {
        $orderRepository = new OrderRepositoryImpl();
        $paymentRepository = new PaymentRepositoryImpl();
        $detailRepository = new DetailRepositoryImpl();
        $paymentService = new PaymentServiceImpl($paymentRepository);
        $food = new Food("Mie Goreng", 6000);
        $orderRepository->save(new Order(1, $food->getName(), $food->getPrice(), 1));
        $detailRepository->details[1] = new Detail(1, $food->getName(), $food->getPrice(), 1);
        $food = new Food("Soto Ayam", 12000);
        $orderRepository->save(new Order(1, $food->getName(), $food->getPrice(), 1));
        $detailRepository->details[2] = new Detail(1, $food->getName(), $food->getPrice(), 1);
        $drink = new Drink("Es Campur", 12000);
        $orderRepository->save(new Order(2, $drink->getName(), $drink->getPrice(), 2));
        $orderRepository->details[3] = new Detail(2, $drink->getName(), $drink->getPrice(), 2);
        $orders = $orderRepository->findAll();
        $orders = array_filter($orders, fn($order)=>$order->getCode() == 1);
        $total = array_sum(array_map(fn($order)=>$order->getSubTotal(), $orders));
        $paymentRepository->save(new Payment(1, $total, 50000));
        $detailService = new DetailServiceImpl($detailRepository);
        $detailService->showDetail(1);
    }

    testShowDetailNotEmpty();