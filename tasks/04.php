<p>Vytvorte objekt(y) podla struktury nizsie a metodu na zistenie poctu akceptovanych objednavok pre zakaznika:</p>

<pre>
<?php
highlight_string("<?php 
    
    \$customers = [
        [
            'id_customer'   => 1,
            'name'          => 'John Brown',
            'date_add'      => '2021-01-01 00:00:00',
            'orders'        => [
                [
                    'id_order'  => 1,
                    'date_add'  => '2021-01-02 00:00:00',
                    'accepted'  => true
                ]
            ],
        ]
    ];

?>");
?>
</pre>

<pre class="new">
Script:
<?php
highlight_string("<?php 
    
    class Customer {
    
        public int  \$id_customer;
        public string  \$name;
        public string  \$date_add;
        public array  \$orders;
    
        public function __construct(array \$customer)
        {
            /* Save data of customer */
            \$this->id_customer = \$customer['id_customer'];
            \$this->name        = \$customer['name'];
            \$this->date_add    = \$customer['date_add'];

            /* Create orders for this customer */
            foreach (\$customer['orders'] as \$key => \$items){
                \$this->orders[\$key] = new Order(\$items);
            }
        }
    }



    class Order {

        public int \$id_order;
        public string \$date_add;
        public bool \$accepted;

        public function __construct(?array \$order)
        {
            /* Save order data */
            \$this->id_order = \$order['id_order'];
            \$this->date_add = \$order['date_add'];
            \$this->accepted = \$order['accepted'];
        }
    }


    /* Get count accepted orders of customer */
    function getCountAcceptedOrdersOfCustomer(array \$customers, ?int \$id_customer): int
    {
        \$count = 0;

        foreach (\$customers as \$customer)
        {
            if(\$customer->id_customer == \$id_customer) {

                foreach (\$customer->orders as \$order) {
                    if (\$order->accepted === true || \$order->accepted === 1) {
                        \$count++;
                    }
                }
            }
        }

        return \$count;
    }


    /* Create objects Customers, Orders from array Customers */
    foreach (\$customers as \$key => \$customer)
    {
        \$c[\$key] = new Customer(\$customer);
    }

    /* Get data of first customer */
    print_r(\$c[0]);



    /* Get count accepted orders of customer with ID = 1 */
    echo getCountAcceptedOrdersOfCustomer(\$c, 1);


?>");
?>
Result:

print_r($c[0]);

<?php

//Vytvorte objekt(y) podla struktury nizsie a metodu na zistenie poctu akceptovanych objednavok pre zakaznika:

$customers = [
    [
        'id_customer'   => 1,
        'name'          => 'John Brown',
        'date_add'      => '2021-01-01 00:00:00',
        'orders'        => [
            [
                'id_order'  => 1,
                'date_add'  => '2021-01-02 00:00:00',
                'accepted'  => true
            ],
            [
                'id_order'  => 2,
                'date_add'  => '2021-01-02 00:00:00',
                'accepted'  => false
            ]
        ],
    ],
    [
        'id_customer'   => 2,
        'name'          => 'Marek Zofota',
        'date_add'      => '2021-01-01 00:00:00',
        'orders'        => [
            [
                'id_order'  => 3,
                'date_add'  => '2021-01-02 00:00:00',
                'accepted'  => true
            ],
            [
                'id_order'  => 4,
                'date_add'  => '2021-01-02 00:00:00',
                'accepted'  => true
            ],
            [
                'id_order'  => 5,
                'date_add'  => '2021-01-02 00:00:00',
                'accepted'  => false
            ]
        ],
    ]
];



class Customer {

    public int $id_customer;
    public string $name;
    public string $date_add;
    public array $orders;

    public function __construct(array $customer)
    {
        // save customer
        $this->id_customer = $customer['id_customer'];
        $this->name        = $customer['name'];
        $this->date_add    = $customer['date_add'];

        // create orders for this customer
        foreach ($customer['orders'] as $key => $items){
            $this->orders[$key] = new Order($items);
        }
    }
}



class Order {

    public int $id_order;
    public string $date_add;
    public bool $accepted;

    public function __construct(?array $order)
    {
        $this->id_order = $order['id_order'];
        $this->date_add = $order['date_add'];
        $this->accepted = $order['accepted'];
    }
}


/* Get count accepted orders of customer */
function getCountAcceptedOrdersOfCustomer(array $customers, ?int $id_customer): int
{
    $count = 0;

    foreach ($customers as $customer)
    {
        if($customer->id_customer === $id_customer) {

            foreach ($customer->orders as $order) {
                if ($order->accepted === true || $order->accepted === 1) {
                    $count++;
                }
            }
        }
    }

    return $count;
}


// create customers as objects
foreach ($customers as $key => $customer)
{
    $c[$key] = new Customer($customer);
}

// first customer
print_r($c[0]);

// get count accepted orders of customer with ID = 1
echo '<br>Count accepted orders of customer with ID = 1 is: ' . getCountAcceptedOrdersOfCustomer($c, 1);

?>
</pre>
