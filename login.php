<!DOCTYPE html>
<html>
<head>
    <title>Shwe Pyi Taw Hospital</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="IMG/Logo.png" alt="Logo" width="39" height="28" class="d-inline-block align-text-top">
                Shwe Pyi Taw Management
            </a>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 col-sm-12 d-flex align-items-center justify-content-center left">
                <div class="h">
                    <img src="IMG/Logo.png" alt="">
                </div>
            </div>
            <div class="col-md-6 col-sm-12 d-flex align-items-center justify-content-center right">
                <form action="login.php" method="POST" class="ms-5">
                    <div class="img text-center">
                        <img src="IMG/user.png" class="usr" alt="">
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">Username</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="username" id="username" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPassword3" class="col-sm-3 col-form-label">Password</label>
                        <div class="col-sm-6 input-group"> <!-- Added "input-group" here -->
                            <input type="password" class="form-control" name="password" id="password" required>
                            <div class="input-group-append">
                                <span class="input-group-text" id="eye-toggle">
                                    <i class="bi bi-eye"></i>
                                </span>
                            </div>
                        </div> <!-- Added "input-group" here -->
                    </div>
                    <div class="text-center pt-2">
                        <button type="submit" class="btn btn-primary w-25" name="login" value="login">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            const passwordField = document.getElementById('password');
            const eyeToggle = document.getElementById('eye-toggle');

            eyeToggle.addEventListener('click', function() {
                if (passwordField.type === 'password') {
                    passwordField.type = 'text';
                    eyeToggle.innerHTML = '<i class="bi bi-eye-slash"></i>';
                } else {
                    passwordField.type = 'password';
                    eyeToggle.innerHTML = '<i class="bi bi-eye"></i>';
                }
            });
        });
    </script>
</body>
</html>
<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Replace these values with your database credentials.
    $db_host = "localhost";
    $db_username = "admin";
    $db_password = "2424";
    $db_name = "Hospital";

    // Create a database connection
    $conn = new mysqli($db_host, $db_username, $db_password, $db_name);

    if ($conn->connect_error) {
        die("Database connection failed: " . $conn->connect_error);
    }

    // Prepare a SQL query to check the user's credentials
    $query = "SELECT * FROM User WHERE username = ? AND password = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        // User credentials are valid
        $_SESSION["authenticated"] = true;
        header("Location: index.php");
        exit();
    } else {
        // User credentials are not valid
        header("Location: login.php?error=1");
        exit();
    }

    // $stmt->close();
    // $conn->close();
}
?>