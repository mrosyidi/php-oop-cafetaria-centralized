<?php 

    namespace Repository 
    {
        use Entity\Payment;

        interface PaymentRepository
        {
            public function findAll(): array;
            public function save(Payment $payment): void;
        }
    }