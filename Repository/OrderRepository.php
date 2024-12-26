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

        class OrderRepositoryImpl implements OrderRepository 
        {
            private array $orders = array();

            public function findAll(): array
            {
                return $this->orders;
            }

            public function save(Order $order): void 
            {
                $index = sizeof($this->orders) + 1;
                $this->orders[$index] = $order;
            }

            public function remove(int $code): void
            {
                $counter = 0;
                $temporary = array();

                for($index = 1; $index <= sizeof($this->orders); $index++)
                {
                    if($this->orders[$index]->getCode() != $code)
                    {
                        $counter++;
                        $temporary[$counter] = $this->orders[$index];
                    }
                }

                $this->orders = $temporary;
            }
        }
    }