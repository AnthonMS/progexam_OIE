<html>
<head>
    <title>OIE Index</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

<?php
include ("Includes/DB_connect.php");

if (!isset($_GET["page"])) {
    include ("home.php");
} else {
    switch ($_GET["page"])
    {
        case "home":
            include ("Home.php");
            break;
        case "orders":
            include ("Orders.php");
            break;
        case "admin":
            include("Admin.php");
            break;
    }
}


?>
<header id="header">
    <h1>OIE Startside</h1>
</header>

<div id="nav">
    <ul class="mainBtns">
        <li class="nav_button">
            <a href="?page=home">Hjem</a>
        </li>
        <li class="nav_button">
            <a href="?page=orders">Ordre</a>
        </li>
        <li class="nav_button">
            <a href="?page=admin">Admin</a>
        </li>
    </ul>
</div>



</body>
</html>

