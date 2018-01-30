<?php

include_once("initSession.php");

?>

<html>
<head>
    <title>Create Bank Account</title>
</head>
<body>

<?php
    include("menu.php");
    if(isset($_POST["submit"])){ //POST instead of GET needed
        $account = new BankAccount($_POST["name"],$_POST["type"]);
        $_SESSION["accounts"]=BankAccount::$accounts; // missing semi-colon
        $_SESSION["accountNum"]=BankAccount::$totalAccounts;


    }
    else {
        ?>
        <form method="POST">
            Enter Name of Account:<input name="name" />
            <br />
            Select type of Account:
            <select name="type">
                <option value="Savings">Savings</option>
                <option value="Checking">Checking</option>
            </select>
            <br />
            <input type="submit" name="submit" value="Create" />
        </form>
        <?php
    } //missing brace
?>
</body>
</html>
