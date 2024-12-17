<?php 

    namespace Repository 
    {
        use Entity\Order;

        interface OrderRepository
        {
            public function findAll(): array;
            public function save(Order $order): void;
            public function remove(int $code): void;
        }
    }