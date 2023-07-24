<?php
// logout.php

session_start();
logout();

function logout()
{
    session_unset();
    session_destroy();
    header('Location: login.php');
    exit();
}
?>
