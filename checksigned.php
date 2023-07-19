<?php
session_start();
if (isset($_SESSION["user_id"])) {
    header("Location:create.php");
}else{
    header("location:signup.php?s='notsigned'");
}


?>