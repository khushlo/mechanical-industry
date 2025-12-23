<?php
require_once '../includes/functions.php';
requireAdmin();

if (isset($_GET['logout'])) {
    session_destroy();
    redirect('login.php');
}
?>