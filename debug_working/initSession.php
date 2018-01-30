<?php
    include_once("BankAccount.php");
    session_start();
    if(isset($_SESSION["accounts"])) {
        BankAccount::$accounts = $_SESSION["accounts"];
        BankAccount::$totalAccounts = $_SESSION["accountNum"]; //wrong variable
    }
?>