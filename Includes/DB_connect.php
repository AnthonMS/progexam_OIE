<?php
/**
 * Created by PhpStorm.
 * User: Antho
 * Date: 24-11-2017
 * Time: 08:58
 */

$serverName = "localhost";
$username = "root";
$password = "root";
$dbName = "progexam_1";
$connect = new mysqli($serverName, $username, $password, $dbName);
if ($connect->connect_error)
{
    die("Connection failed... " + $connect->connect_error);
}
//echo "Connection succesful";

?>