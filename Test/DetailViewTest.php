<?php 

    require_once __DIR__ . "/../Repository/PaymentRepository.php";
    require_once __DIR__ . "/../Repository/DetailRepository.php";
    require_once __DIR__ . "/../Service/PaymentService.php";
    require_once __DIR__ . "/../Service/DetailService.php";
    require_once __DIR__ . "/../View/DetailView.php";
    require_once __DIR__ . "/../Helper/InputHelper.php";

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

    testViewShowDetailEmpty();