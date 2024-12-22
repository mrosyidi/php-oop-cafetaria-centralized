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
            private array $payments = array();

            public function findAll(): array
            {
                return $this->payments;
            }

            public function save(Payment $payment): void 
            {
                $index = sizeof($this->payments) + 1;
                $this->payments[$index] = $payment;
            } 
        }
    }