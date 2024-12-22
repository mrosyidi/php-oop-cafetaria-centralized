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

            public function showPayment(): void
            {
                while(true)
                {
                    $this->orderService->showOrder();

                    echo "Menu Pembayaran" . PHP_EOL;
                    echo "1. Bayar Pesanan" . PHP_EOL;
                    echo "x. Kembali" . PHP_EOL;

                    $pilihan = InputHelper::input("Pilih");

                    if($pilihan == "1")
                    {
                        
                    }else if($pilihan == "x")
                    {
                        break;
                    }else
                    {
                        echo "Pilihan tidak dimengerti" . PHP_EOL;
                    }
                }
            }
        }
    }