<!doctype html>
<html lang="en">
<?php
if (!isset($_SESSION)) {
    session_start();
}

if ($_SESSION["username"]) {
    ?>
    <?php
    include('db.php');
    $object = new database();
    ?>
    <?php include('adminhead.php'); ?>
    <title>hospital_details.php</title>

    <body>
    <?php
    include('adminheader.php');
    ?>


    <section style="background-color: #ECFFEC; flex: 1; margin-bottom: 80px; height: 100vh;">
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                    <div class="card" style="border-radius: 1rem;">
                        <div class="card-body p-4 p-lg-5 text-black">
                            <h3 class="text-center">Edit Hospital Details</h3>
                            <?php
                            if (isset($_GET['id']) && isset($_GET['action']) && $_GET['action'] === 'delete') {
                                $deleteId = $_GET['id'];
                                $query = "DELETE FROM hospital_details WHERE hospital_id='$deleteId'";
                                if (mysqli_query($object->dbConnection(), $query)) {
                                    echo '<div class="alert alert-success text-center mx-auto" role="alert">Record deleted successfully</div>';

                                } else {
                                    echo '<div class="alert alert-danger text-center mx-auto" role="alert">Record Not deleted</div>';

                                }
                            }
                            if (!isset($_SESSION)) {
                                session_start();
                            }
                            if (isset($_GET['update']) && ($_GET['update'] == 1)) {
                                echo '<div class="alert alert-success text-center mx-auto" role="alert">Record Updating Successfully</div>';
                            } elseif (isset($_GET['error']) && ($_GET['error'] == 1)) {
                                echo '<div class="alert alert-danger text-center mx-auto" role="alert">Record Not Update</div>';
                            }
                            ?>

                            <div class="table-responsive">
                                <table class="table table-striped mb-4" style="width: 100%;">
                                    <tr>
                                        <th>Id</th>
                                        <th>Hospital Name</th>
                                        <th>Hospital Email</th>
                                        <th>Hospital Address</th>
                                        <th>Location</th>
                                        <th>Contact Number</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                    <?php
                                    if (!isset($_SESSION)) {
                                        session_start();
                                    }

                                    $query = "SELECT * FROM hospital_details";
                                    $result = mysqli_query($object->dbConnection(), $query);
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<tr>
                                                    <td>" . $row['hospital_id'] . "</td>
                                                    <td>" . $row['hospital_name'] . "</td>
                                                    <td>" . $row['email_id'] . "</td>
                                                    <td>" . $row['hospital_address'] . "</td>
                                                    <td>" . $row['location'] . "</td>
                                                    <td>" . $row['contact_number'] . "</td>
                                                    <td><a class='edit' title='Edit' data-toggle='tooltip' href='add_hos.php?id=" . $row['hospital_id'] . "'><i class='material-icons'></i></a></td>
                                                    <td><a class='delete' title='Delete' data-toggle='tooltip' href='?id=" . $row['hospital_id'] . "&action=delete'><i class='material-icons'></i></a></td>
                                                </tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='8'>0 results</td></tr>";
                                    }
                                    ?>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer style="background-color: #f8f9fa; padding: 10px; position: fixed; bottom: 0; width: 100%;">
        <!-- Add your footer content here -->
        <?php include('adminfooter.php'); ?>
    </footer>


    <?php
} else {
    header("Location: login.php");
}
?>


</body>

</html>
