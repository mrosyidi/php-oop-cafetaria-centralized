<?php

    require_once __DIR__ . "/../Helper/InputHelper.php";

    use Helper\InputHelper;

    function testInputHelper(): void
    {
        $name = InputHelper::input("Name");
        echo "Name : " . $name . PHP_EOL;
    }

    testInputHelper();