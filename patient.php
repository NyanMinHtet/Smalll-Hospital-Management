<div class="container mt-3">
    <h2>Patient List</h2>
    <!-- Add Patient Form -->
    <form method="post" action="add_patient.php">
        <div class="form-group">
            <label for="patient_name">Patient Name</label>
            <div class="col-sm input-group"> 
                <input type="text" name="patient_name" class="form-control" required>
                <div class="input-group-append">
                    <span class="input-group-text" id="eye-toggle">
                        <i class="bi bi-search"></i>
                    </span>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-end">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addPatientModal">Add Patient</button>
        </div>
    </form>

    <?php
    include 'db.php';

    $query = "SELECT * FROM Patient";
    $result = mysqli_query($conn, $query);

    // HTML table to display patient data
    echo '<table class="table mt-3">';
    echo '<thead>';
    echo '<tr>';
    echo '<th>ID</th>';
    echo '<th>Name</th>';
    echo '<th>Age</th>';
    echo '<th>Gender</th>';
    echo '<th>Disease</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>' . $row['id'] . '</td>';
        echo '<td>' . $row['name'] . '</td>';
        echo '<td>' . $row['age'] . '</td>';
        echo '<td>' . $row['gender'] . '</td>';
        echo '<td>' . $row['disease'] . '</td>';
        echo '<td>';
        echo '<button class="btn btn-primary btn-sm">Update</button><button class="btn btn-danger btn-sm">Delete</button>';
        echo '</td>';
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
    ?>
</div>

<!-- Bootstrap Modal for Adding a Patient -->
<div class="modal fade" id="addPatientModal" tabindex="-1" role="dialog" aria-labelledby="addPatientModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addPatientModalLabel">Add Patient</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Patient input form with PHP action -->
                <form action="add_patient.php" method="POST">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="disease">Age:</label>
                        <input type="text" class="form-control" name="age" required>
                    </div>
                    <div class="form-group">
                        <label for="disease">Gender:(M/F)</label>
                        <input type="text" class="form-control" name="gender" required>
                    </div>
                    <div class="form-group">
                        <label for="disease">Disease:</label>
                        <input type="text" class="form-control" name="disease" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="submit" class="btn btn-primary">Add Patient</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
