<?php 

    namespace Helper 
    {
        class CodeHelper
        {
            public static function code(array $orders, array $payments, bool $exit): int
            {
                if(empty($orders) && empty($payments))
                {
                    $code = 1;
                }else if(empty($orders) && !empty($payments))
                {                    
                    $max = max(array_column($payments, 'code'));
                    $code = $max + 1;
                }
                else if(!empty($orders) && !$exit)
                {
                    $code = $orders[sizeof($orders)]->getCode();
                }else if(!empty($orders) && $exit)
                {
                    $max = max(array_column($payments, 'code'));

                    if(!empty($payments))
                    {
                        $paymentMax = max(array_column($payments, 'code'));
                        $max = $max < $paymentMax ? $paymentMax : $max;
                    }

                    $code = $max + 1;
                }

                return $code;
            }
        }
    }