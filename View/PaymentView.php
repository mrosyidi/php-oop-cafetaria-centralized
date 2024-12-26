<?php 

    namespace View 
    {
        use Service\OrderService;
        use Service\PaymentService;
        use Service\DetailService;
        use Helper\DuplicateHelper;
        use Helper\FindHelper;
        use Helper\InputHelper;
        use Helper\PayHelper;
    
        class PaymentView
        {
            private PaymentService $paymentService;
            private OrderService $orderService;
            private DetailService $detailService;

            public function __construct(PaymentService $paymentService, OrderService $orderService, DetailService $detailService)
            {
                $this->paymentService = $paymentService;
                $this->orderService = $orderService;
                $this->detailService = $detailService;
            }

            public function showPayment(): void
            {
                while(true)
                {
                    $this->orderService->showOrder();

                    echo "Menu Pembayaran" . PHP_EOL;
                    echo "1. Bayar Pesanan" . PHP_EOL;
                    echo "x. Kembali" . PHP_EOL;

                    $pilihan = InputHelper::input("Pilih");

                    if($pilihan == "1")
                    {
                        $this->addPayment();
                    }else if($pilihan == "x")
                    {
                        break;
                    }else
                    {
                        echo "Pilihan tidak dimengerti" . PHP_EOL;
                    }
                }
            }

            public function addPayment(): void
            {
                echo "PEMBAYARAN PESANAN" . PHP_EOL;
                $code = InputHelper::input("Kode Pesanan (x untuk batal)");

                if($code == "x")
                {
                    echo "Batal memproses pesanan" . PHP_EOL;
                }else
                {
                    $orders = $this->orderService->getOrder();
                    $codeOrder = FindHelper::find($orders, $code);

                    if($codeOrder)
                    {
                        $pay = PayHelper::pay($orders, $code);
                        echo "Total yang harus dibayar : Rp." . $pay . PHP_EOL;

                        $money = InputHelper::input("Jumlah uang (x untuk batal)");

                        if($money == "x")
                        {
                            echo "Batal memproses pesanan" . PHP_EOL;
                        }else if(!is_numeric($money))
                        {
                            echo "Gagal memproses pesanan, jumlah uang harus bilangan" . PHP_EOL;
                        }else if($money < $pay)
                        {
                            echo "Gagal memproses pesanan, jumlah uang yang digunakan tidak cukup" . PHP_EOL;
                        }else
                        {
                            $change = $money-$pay;
                            $this->paymentService->addPayment($code, $pay, $money);
                            $elements = DuplicateHelper::duplicate($orders, $code);
                            $this->orderService->removeOrder($code);
                            $this->detailService->addDetail($elements);

                            echo "Kembalian : Rp." . $change . PHP_EOL;
                        }
                    }else
                    {
                        echo "Kode pesanan tidak ditemukan" . PHP_EOL;
                    }
                }
            }
        }
    }