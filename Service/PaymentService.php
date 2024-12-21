<?php 

    namespace Service 
    {
        use Entity\Payment;
        use Repository\PaymentRepository;

        interface PaymentService
        {
            public function showPayment(): void;
            public function addPayment(int $code, int $total, int $pay): void;
            public function getPayment(): array;
        }
    }