<?php
session_start();
if (isset($_SESSION['remember_me']) && $_SESSION['remember_me'] == true) {
    header("location:Liste.php");
}
