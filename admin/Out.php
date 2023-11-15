<?php
session_start();

if (isset($_SESSION['loginUser']) && $_SESSION['loginUser'] <> '') {
session_destroy();
}
header("location:login.php");