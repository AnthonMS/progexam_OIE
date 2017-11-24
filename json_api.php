<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include ("Includes/DB_connect.php");

$sql = "SELECT * FROM orders o LEFT JOIN customers c ON o.CUSTOMER_ID = c.CUST_ID LEFT JOIN agents a ON c.AGENT_ID = a.AGENT_ID";
$result = $connect->query($sql);

if ($result->num_rows > 0)
{
    // output the data found in the SQL query
    $orderArray = array();
    while ($row = $result->fetch_assoc())
    {
        $obj = new stdClass();
        $obj->order_id = $row["ORD_ID"];
        $obj->agent_name = $row["AGENT_NAME"];
        $obj->customer_name = $row["CUST_NAME"];
        $obj->order_date = $row["ORD_DATE"];
        $obj->order_desc = $row["ORD_DESCRIPTION"];
        $obj->order_amount = $row["ORD_AMOUNT"];
        $obj->advance_amount = $row["ADVANCE_AMOUNT"];

        array_push($orderArray, $obj);
        //$json_arr = json_encode()
        //echo '"item'.$obj->id.'" : ' .json_encode($obj) . ",";
    }

    $json_arr = json_encode($orderArray);
    echo $json_arr;
} else {
    echo "0 results";
}

?>