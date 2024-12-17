<?php 

    namespace View 
    {
        use Service\OrderService;
        use Service\FoodService;
        use Service\DrinkService;
        use Helper\InputHelper;

        class OrderView
        {
            private OrderService $orderService;
            private FoodService $foodService;
            private DrinkService $drinkService;

            public function __construct(OrderService $orderService, FoodService $foodService, DrinkService $drinkService)
            {
                $this->orderService = $orderService;
                $this->foodService = $foodService;
                $this->drinkService = $drinkService;
            }
        }
    }