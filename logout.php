<?php

session_start();

if(isset($_SESSION['Registration_ID']))
{
    unset($_SESSION['Registration_ID']);
}

header("Location: login.php");
die;