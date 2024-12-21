<?php 

    namespace View 
    {
        use Service\OrderService;
        use Service\PaymentService;
        use Helper\InputHelper;
    
        class PaymentView
        {
            private PaymentService $paymentService;
            private OrderService $orderService;

            public function __construct(PaymentService $paymentService, OrderService $orderService)
            {
                $this->paymentService = $paymentService;
                $this->orderService = $orderService;
            }
        }
    }