<?php 

    namespace Helper 
    {
        class CodeHelper
        {
            public static function code(array $orders, bool $exit): int
            {
                if(empty($orders))
                {
                    $code = 1;
                }else if(!empty($orders) && !$exit)
                {
                    $code = $orders[sizeof($orders)]->getCode();
                }else if(!empty($orders) && $exit)
                {
                    $code = $orders[sizeof($orders)]->getCode() + 1;
                }

                return $code;
            }
        }
    }