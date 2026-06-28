<?php
session_start();
if ($_SESSION['role'] != 'admin') {
    header("Location: ../auth/login.php");
}
?>

<?php include("../includes/navbar.php"); ?>

<div class="container mt-4">
    <h2>Admin Dashboard</h2>

    <a href="reports.php" class="btn btn-primary">View Reports</a>
</div>