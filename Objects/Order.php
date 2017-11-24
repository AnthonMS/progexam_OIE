<?php
class Order {
    private $conn;
    private $table_name = "orders";

    public $orderID;
    public $agentID;
    public $customerID;
    public $orderDate;
    public $orderDesc;
    public $orderAmount;
    public $advAmount;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    function readOrders()
    {
        $query = "SELECT * FROM orders o LEFT JOIN customers c ON o.CUSTOMER_ID = c.CUST_ID LEFT JOIN agents a ON c.AGENT_ID = a.AGENT_ID";
        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        return $stmt;
    }

}
?>