<?php
session_start();
include("../config/db.php");

if ($_SESSION['role'] != 'admin') {
    header("Location: ../auth/login.php");
}
?>

<?php include("../includes/navbar.php"); ?>

<div class="container mt-4">
    <h2>System Reports</h2>

    <h4>Users</h4>
    <table class="table table-bordered">
        <tr>
            <th>Name</th>
            <th>Role</th>
        </tr>

        <?php
        $res = $conn->query("SELECT * FROM users");
        while ($row = $res->fetch_assoc()) {
            echo "<tr><td>" . $row['name'] . "</td><td>" . $row['role'] . "</td></tr>";
        }
        ?>
    </table>

    <h4>Orders</h4>
    <table class="table table-bordered">
        <tr>
            <th>User ID</th>
            <th>Total</th>
        </tr>

        <?php
        $res = $conn->query("SELECT * FROM orders");
        while ($row = $res->fetch_assoc()) {
            echo "<tr><td>" . $row['user_id'] . "</td><td>KES " . $row['total'] . "</td></tr>";
        }
        ?>
    </table>
</div>