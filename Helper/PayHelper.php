<?php 

    namespace Helper 
    {
        class PayHelper
        {
            public static function pay(array $orders, int $code): int
            {
                $total = 0;

                for($index = 1; $index <= count($orders); $index++)
                {
                    if($orders[$index]->getCode() == $code)
                    {
                        $total = $total + $orders[$index]->getSubTotal();
                    }
                }

                return $total;
            }
        }
    }