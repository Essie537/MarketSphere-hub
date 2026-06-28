<?php
session_start();
include("../config/db.php");

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['role'] = $user['role'];

            if ($user['role'] == 'buyer') {
                header("Location: ../buyer/dashboard.php");
            } elseif ($user['role'] == 'seller') {
                header("Location: ../seller/dashboard.php");
            } else {
                header("Location: ../admin/dashboard.php");
            }
        } else {
            echo "<div class='alert alert-danger'>Wrong password</div>";
        }
    }
}
?>

<div class="container mt-5">
    <h2>Login</h2>
    <form method="POST" class="card p-4">
        <input type="email" name="email" class="form-control mb-3" placeholder="Email">
        <input type="password" name="password" class="form-control mb-3" placeholder="Password">
        <button name="login" class="btn btn-primary">Login</button>
    </form>
</div>