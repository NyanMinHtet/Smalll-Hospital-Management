<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">


<div class="container mt-3">
    <h2>Doctor List</h2>

    <form method="post" action="add_doctor.php">
        <div class="form-group">
            <label for="doctor_name">Doctor Name</label>
            <div class="input-group"> <!-- Added "input-group" here -->
                <input type="text" name="doctor_name" class="form-control border border-dark">
                <div class="input-group-append">
                    <span class="input-group-text" id="eye-toggle">
                        <i class="bi bi-search"></i>
                    </span>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-end">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addDoctorModal">Add Doctor</button>
        </div>
    </form>

    <?php
    include 'db.php';

    $query = "SELECT * FROM Doctor";
    $result = mysqli_query($conn, $query);

    // HTML table to display doctor data
    echo '<table class="table mt-3">';
    echo '<thead>';
    echo '<tr>';
    echo '<th>ID</th>';
    echo '<th>Name</th>';
    echo '<th>Specialty</th>';
    echo '<th>Actions</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>' . $row['id'] . '</td>';
        echo '<td>' . $row['name'] . '</td>';
        echo '<td>' . $row['field'] . '</td>';
        echo '<td>';
        echo '<button class="btn btn-primary btn-sm">Update</button><button class="btn btn-danger btn-sm">Delete</button>';
        echo '</td>';
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
    ?>
</div>




<!-- Bootstrap Modal for Adding a Doctor -->
<div class="modal fade" id="addDoctorModal" tabindex="-1" role="dialog" aria-labelledby="addDoctorModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addDoctorModalLabel">Add Doctor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Doctor input form with PHP action -->
                <form action="add_doctor.php" method="POST">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="specialty">Specialty:</label>
                        <input type="text" class="form-control" name="specialty" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="submit" class="btn btn-primary">Add Doctor</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
