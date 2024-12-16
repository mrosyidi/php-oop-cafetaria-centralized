<?php 

    namespace Helper
    {
        class CheckHelper
        {
            public static function check(array $items, string $name): bool
            {
                $found = false;

                foreach($items as $key => $item)
                {
                    $item_name = preg_replace('/\s+/', '', strtolower($item->getName()));
                    $name = preg_replace('/\s+/', '', strtolower($name));

                    if($item_name === $name)
                    {
                        $found = true;
                    }
                }

                return $found;
            }
        }
    }