<?php
    session_start();
    $user = isset($_SESSION['user_data']) ? $_SESSION['user_data'] : null;
    require_once(__DIR__."/layout.inc.php");