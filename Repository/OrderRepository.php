<?php 

    namespace Repository 
    {
        use Entity\Order;

        interface OrderRepository
        {
            public function findAll(): array;
            public function save(Order $order): void;
        }

        class OrderRepositoryImpl implements OrderRepository 
        {
            public array $orders = array();

            public function findAll(): array
            {
                return $this->orders;
            }

            public function save(Order $order): void 
            {
                
            }

        }
    }