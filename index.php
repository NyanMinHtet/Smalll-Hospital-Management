<!DOCTYPE html>
<html>
<head>
    <title>Shwe Pyi Taw Hospital</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="Home.php">
                <img src="IMG/Logo.png" alt="Logo" width="39" height="28" class="d-inline-block align-text-top">
                Shwe Pyi Taw Management
            </a>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="logout.php" id="logoutLink">Log Out</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#doctors">Doctors</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#patients">Patients</a>
            </li>
        </ul>
        <div class="tab-content">
            <div id="doctors" class="tab-pane fade show active">
                <?php include('doctor.php'); ?>
            </div>
            <div id="patients" class="tab-pane fade">
                <?php include('patient.php'); ?>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
    document.getElementById("logoutLink").addEventListener("click", function(e) {
        e.preventDefault(); // Prevent the default link behavior
        var confirmLogout = confirm("Are you sure you want to log out?");
        if (confirmLogout) {
            // Perform the log out action, e.g., by redirecting to "logout.php"
            window.location.href = "logout.php";
        }
    });
</script>

</body>
</html>

