<?php
session_start();
if (isset($_SESSION['user_id'])) {
    header(header: "Location: dashboard.php");
    exit;
}
?>
