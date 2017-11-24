<html>
<head>
    <title>OIE Admin Login</title>
    <meta charset="UTF-8">

    <link rel="stylesheet" type="text/css" href="css/style.css">

</head>
<body>

<?php
$submitErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $name = ""; $pass = "";
    if (!empty($_POST["nameInput"]) && !empty($_POST["passInput"]))
    {
        // title is not empty
        $name = checkInput($_POST["nameInput"]);
        $pass = checkInput($_POST["passInput"]);
        //$submitErr = $name . ", " . $pass;
    } else {
        $submitErr = "Name or Password cannot be empty";

    }
    if (!empty($name) && !empty($pass))
    {
        // no empty fields
        $pass = mysqli_real_escape_string($connect, $pass); // To prevent sql injection

        $sql = "SELECT * FROM users WHERE USER_NAME='$name' LIMIT 1";
        $query = mysqli_query($connect, $sql);
        $rows = mysqli_num_rows($query);
        if ($rows == 1)
        {
            // password correct
            $rowArr = mysqli_fetch_array($query);
            $dbPass = $rowArr['USER_PASS'];
            //session_start();
            //$_SESSION['password'] = $dbPass;

            if ($pass == $dbPass)
            {
                $submitErr = "Login Successful " . $name . ", " . $pass;
            } else {
                $submitErr = "Login Unsuccessful " . $name . ", " . $pass;
            }

            //$submitErr = "Login Successful " . $name . ", " . $pass . ", " . $dbPass;
            //header("Location: index.php?page=admin"); // redirect to the admin panel, if this where a seperate login page
        }
        else {
            // password INcorrect
            $submitErr = "Username or Password incorrect";
        }
    }
}
function checkInput($data)
{
    $data = trim($data);
    $data = stripcslashes($data);
    $data = strip_tags($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<form method="post" action="?page=admin">
    <table id="adminLoginTable">
        <tr>
            <th class="adminLoginTH">Enter Login details</th>
        </tr>
        <tr>
            <td class="adminLoginTD"><input id="nameInput" type="text" name="nameInput" placeholder="Username"></td>
        </tr>
        <tr>
            <td class="adminLoginTD"><input id="passInput" type="password" name="passInput" placeholder="Password"></td>
        </tr>
        <tr>
            <td class="adminLoginTD"><input type="submit" class="loginBtn" name="loginBtn" value="Login"></td>
        </tr>
        <tr>
            <td class="adminLoginTD"><h3 class="error"><?php echo $submitErr ?></h3></td>
        </tr>
    </table>
</form>

</body>
</html>