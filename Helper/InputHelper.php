<?php 

    namespace Helper
    {
        class InputHelper
        {
            public static function input(string $info): string
            {
                echo "$info : ";
                $result = fgets(STDIN);
                return trim($result);
            }
        }
    }