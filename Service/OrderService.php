<?php 

    namespace Service 
    {
        use Entity\Order;
        use Repository\OrderRepository;

        interface OrderService
        {
            public function showOrder(): void;
            public function addOrder(int $code, string $name, int $price, int $qty): void;
            public function getOrder(): array;
        }
    }