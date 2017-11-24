<?php
/**
 * Created by PhpStorm.
 * User: Antho
 * Date: 24-11-2017
 * Time: 09:12
 */

echo "<table id='ordersTable'>";
echo "<tr>
<th class='ordersTH'>Order Date</th>
<th class='ordersTH'>Customer</th>
<th class='ordersTH'>Agent</th>
<th class='ordersTH'>Order Desc.</th>
<th class='ordersTH'>Order Amount</th>
<th class='ordersTH'>Advance Amount</th>
</tr>";


$sql = "SELECT * FROM orders o LEFT JOIN customers c ON o.CUSTOMER_ID = c.CUST_ID LEFT JOIN agents a ON c.AGENT_ID = a.AGENT_ID";


$result = $connect->query($sql);
if ($result->num_rows > 0)
{
    while ($row = $result->fetch_assoc())
    {
        echo "<tr>";
        echo "<td class='ordersTD'>" . $row["ORD_DATE"] . "</td>";
        echo "<td class='ordersTD'>" . $row["CUST_NAME"] . "</td>";
        echo "<td class='ordersTD'>" . $row["AGENT_NAME"] . "</td>";
        echo "<td class='ordersTD'>" . $row["ORD_DESCRIPTION"] . "</td>";
        echo "<td class='ordersTD'>" . $row["ORD_AMOUNT"] . "</td>";
        echo "<td class='ordersTD'>" . $row["ADVANCE_AMOUNT"] . "</td>";
        echo "</tr>";
    }
}
?>