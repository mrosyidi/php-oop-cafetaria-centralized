<?php 

    namespace Repository 
    {
        use Entity\Payment;

        interface PaymentRepository
        {
            public function findAll(): array;
            public function save(Payment $payment): void;
        }

        class PaymentRepositoryImpl implements PaymentRepository
        {
            public array $payments = array();

            public function findAll(): array
            {
                return $this->payments;
            }

            public function save(Payment $payment): void 
            {
                
            } 
        }
    }