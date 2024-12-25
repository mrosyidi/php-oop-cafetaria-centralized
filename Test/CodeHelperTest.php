<?php 

    require_once __DIR__ . "/../Entity/Food.php";
    require_once __DIR__ . "/../Entity/Drink.php";
    require_once __DIR__ . "/../Entity/Order.php";
    require_once __DIR__ . "/../Entity/Payment.php";
    require_once __DIR__ . "/../Repository/OrderRepository.php";
    require_once __DIR__ . "/../Repository/PaymentRepository.php";
    require_once __DIR__ . "/../Service/OrderService.php";
    require_once __DIR__ . "/../Service/PaymentService.php";
    require_once __DIR__ . "/../Helper/CodeHelper.php";

    use Entity\Food;
    use Entity\Drink;
    use Entity\Order;
    use Repository\OrderRepositoryImpl;
    use Repository\PaymentRepositoryImpl;
    use Service\OrderServiceImpl;
    use Service\PaymentServiceImpl;
    use Helper\CodeHelper;

    function testCodeHelperEmpty(): void
    {
        $orderRepository = new OrderRepositoryImpl();
        $paymentRepository = new PaymentRepositoryImpl();
        $orders = $orderRepository->findAll();
        $payments = $paymentRepository->findAll();
        $code = CodeHelper::code($orders, $payments, true);
        var_dump($code);
    }

    function testCodeHelperSameCode(): void
    {
        $food = new Food("Mie Ayam", 6000);
        $orderRepository = new OrderRepositoryImpl();
        $orderRepository->save(new Order(1, $food->getName(), $food->getPrice(), 2));
        $orders = $orderRepository->findAll();
        $code = CodeHelper::code($orders, false);
        var_dump($code);
    }

    function testCodeHelperDifferentCode(): void
    {
        $food = new Food("Mie Ayam", 6000);
        $orderRepository = new OrderRepositoryImpl();
        $orderRepository->save(new Order(1, $food->getName(), $food->getPrice(), 2));
        $orders = $orderRepository->findAll();
        $code = CodeHelper::code($orders, true);
        var_dump($code);
    }

    function testCodeHelperEvaluate(): void
    {
        $food = new Food("Mie Ayam", 6000);
        $orderRepository = new OrderRepositoryImpl();
        $orderRepository->save(new Order(1, $food->getName(), $food->getPrice(), 2));
        $orders = $orderRepository->findAll();
        $code = CodeHelper::code($orders, true);
        $food = new Food("Pastel", 5000);
        $orderRepository->save(new Order($code, $food->getName(), $food->getPrice(), 2));
        $orders = $orderRepository->findAll();
        $code = CodeHelper::code($orders, true);
        $drink = new Food("Es Campur", 12000);
        $orderRepository->save(new Order($code, $drink->getName(), $drink->getPrice(), 2));
        $orders = $orderRepository->findAll();
        var_dump($orders);
    }

    testCodeHelperEmpty();