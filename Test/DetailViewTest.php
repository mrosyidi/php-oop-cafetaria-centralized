<?php 
    
    require_once __DIR__ . "/../Entity/Food.php";
    require_once __DIR__ . "/../Entity/Drink.php";
    require_once __DIR__ . "/../Entity/Order.php";
    require_once __DIR__ . "/../Entity/Payment.php";
    require_once __DIR__ . "/../Entity/Detail.php";
    require_once __DIR__ . "/../Repository/OrderRepository.php";
    require_once __DIR__ . "/../Repository/PaymentRepository.php";
    require_once __DIR__ . "/../Repository/DetailRepository.php";
    require_once __DIR__ . "/../Service/PaymentService.php";
    require_once __DIR__ . "/../Service/DetailService.php";
    require_once __DIR__ . "/../View/DetailView.php";
    require_once __DIR__ . "/../Helper/FindHelper.php";
    require_once __DIR__ . "/../Helper/InputHelper.php";

    use Entity\Detail;
    use Entity\Food;
    use Entity\Drink;
    use Entity\Order;
    use Entity\Payment;
    use Repository\OrderRepositoryImpl;
    use Repository\PaymentRepositoryImpl;
    use Repository\DetailRepositoryImpl;
    use Service\PaymentServiceImpl;
    use Service\DetailServiceImpl;
    use VIew\DetailView;

    function testViewShowDetailEmpty(): void 
    {
        $paymentRepository = new PaymentRepositoryImpl();
        $paymentService = new PaymentServiceImpl($paymentRepository);
        $detailReposiory = new DetailRepositoryImpl();
        $detailService = new DetailServiceImpl($detailReposiory);
        $detailView = new DetailView($detailService, $paymentService);
        $detailView->showDetail();
    }

    function testViewShowDetailNotEmpty(): void
    {
        $orderRepository = new OrderRepositoryImpl();
        $paymentRepository = new PaymentRepositoryImpl();
        $paymentService = new PaymentServiceImpl($paymentRepository);
        $detailReposiory = new DetailRepositoryImpl();
        $detailService = new DetailServiceImpl($detailReposiory);
        $detailView = new DetailView($detailService, $paymentService);
        $food = new Food("Mie Goreng", 6000);
        $orderRepository->save(new Order(1, $food->getName(), $food->getPrice(), 1));
        $detailReposiory->details[1] = new Detail(1, $food->getName(), $food->getPrice(), 1);
        $food = new Food("Soto Ayam", 12000);
        $orderRepository->save(new Order(1, $food->getName(), $food->getPrice(), 1));
        $detailReposiory->details[2] = new Detail(1, $food->getName(), $food->getPrice(), 1);
        $drink = new Drink("Es Campur", 12000);
        $orderRepository->save(new Order(2, $drink->getName(), $drink->getPrice(), 2));
        $detailReposiory->details[3] = new Detail(2, $drink->getName(), $drink->getPrice(), 2);
        $orders = $orderRepository->findAll();
        $orders = array_filter($orders, fn($order)=>$order->getCode() == 1);
        $total = array_sum(array_map(fn($order)=>$order->getSubTotal(), $orders));
        $paymentRepository->save(new Payment(1, $total, 50000));
        $orders = $orderRepository->findAll();
        $orders = array_filter($orders, fn($order)=>$order->getCode() == 2);
        $total = array_sum(array_map(fn($order)=>$order->getSubTotal(), $orders));
        $paymentRepository->save(new Payment(2, $total, 50000));
        $detailView->showDetail();
    }

    function testViewFilterDetail(): void
    {
        $orderRepository = new OrderRepositoryImpl();
        $paymentRepository = new PaymentRepositoryImpl();
        $paymentService = new PaymentServiceImpl($paymentRepository);
        $detailReposiory = new DetailRepositoryImpl();
        $detailService = new DetailServiceImpl($detailReposiory);
        $detailView = new DetailView($detailService, $paymentService);
        $food = new Food("Mie Goreng", 6000);
        $orderRepository->save(new Order(1, $food->getName(), $food->getPrice(), 1));
        $detailReposiory->save(new Detail(1, $food->getName(), $food->getPrice(), 1));
        $food = new Food("Soto Ayam", 12000);
        $orderRepository->save(new Order(1, $food->getName(), $food->getPrice(), 1));
        $detailReposiory->save(new Detail(1, $food->getName(), $food->getPrice(), 1));
        $drink = new Drink("Es Campur", 12000);
        $orderRepository->save(new Order(2, $drink->getName(), $drink->getPrice(), 2));
        $detailReposiory->save(new Detail(2, $drink->getName(), $drink->getPrice(), 2));
        $orders = $orderRepository->findAll();
        $orders = array_filter($orders, fn($order)=>$order->getCode() == 1);
        $total = array_sum(array_map(fn($order)=>$order->getSubTotal(), $orders));
        $paymentRepository->save(new Payment(1, $total, 50000));
        $orders = $orderRepository->findAll();
        $orders = array_filter($orders, fn($order)=>$order->getCode() == 2);
        $total = array_sum(array_map(fn($order)=>$order->getSubTotal(), $orders));
        $paymentRepository->save(new Payment(2, $total, 50000));
        $paymentService->showPayment();
        $detailView->filterDetail();
    }

    testViewFilterDetail();