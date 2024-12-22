<?php 

    namespace View 
    {
        use Service\PaymentService;
        use Service\DetailService;

        class DetailView
        {
            private PaymentService $paymentService;
            private DetailService $detailService;

            public function __construct(DetailService $detailService, PaymentService $paymentService)
            {
                $this->detailService = $detailService;
                $this->paymentService = $paymentService;
            }
        }

    }