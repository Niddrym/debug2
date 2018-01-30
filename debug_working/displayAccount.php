<?php
include_once("initSession.php"); //square braces
if(isset($_SESSION["accounts"])) {
    var_dump($_SESSION["accounts"]);
}
include("menu.php");
?>