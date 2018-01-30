<?php

include_once("initSession.php");

?>

<html>
<head>
    <title>Move Money</title>
</head>
<body>

<?php
include("menu.php");
if(isset($_POST["submit"])) { //missing curly braces causes else to be part of sub if set
    if ($_POST['type'] == "Deposit") {
        BankAccount::$accounts[$_POST['act']]->deposit($_POST['amt']);
        echo "<br>Deposited $" . $_POST['amt'] . " to " . BankAccount::$accounts[$_POST['act']]->name; //wrong class operator
    } else if ($_POST['type'] == "Withdraw") {
        echo "here";
        BankAccount::$accounts[$_POST['act']]->withdraw($_POST['amt']);
        echo "<br>Withdrew $" . $_POST['amt'] . " to " . BankAccount::$accounts[$_POST['act']]->name; //wrong class operator
    }
}
else {

        ?>
        <br/>
        <form method="POST">
            Which Account?
            <select name="act">
                <?php
                foreach (BankAccount::$accounts as $key => $value) {
                    echo "<option value=\"$key\">" . $value->name . " - " . $value->type . "</option>";
                }
                ?>
            </select>
            <br/>
            What are you doing?
            <select name="type">
                <option value="Deposit">Deposit</option>
                <option value="Withdraw">Withdraw</option>
            </select>
            <br/>
            Enter Amount:<input name="amt"/>
            <br/>
            <input type="submit" name="submit" value="Move Money"/>
        </form>
        <?php
}
?>
</body>
</html>