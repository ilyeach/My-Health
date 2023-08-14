<!doctype html>
<html lang="en">
<?php
if (!isset($_SESSION)) {
    session_start();
}

if ($_SESSION["username"]) {
    ?>
   
    <?php include('adminhead.php'); ?>
    <title>hospital_details.php</title>

 <body style="background-image: url('images/a_bg1.jpg'); background-size: cover;">
    <?php
    include('adminheader.php');
    ?>


    <section>
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                    <div class="card" style="border-radius: 1rem;">
                        <div class="card-body p-4 p-lg-5 text-black">
                            <h3 class="text-center">Edit Hospital Details</h3>
                           

                            <div class="table-responsive">
                                <table class="table table-striped mb-4" style="width: 100%;">
                                    <tr>
                                        <th>Id</th>
                                        <th>Patient Name</th>
                                        <th>Patient Email</th>
                                        <th>Date Of Birth</th>
                                        <th>Contact Number</th>
                                        <th>Gender</th>
                                    </tr>
                                    <?php
                                    if (!isset($_SESSION)) {
                                        session_start();
                                    }
									$query = "SELECT * FROM patient_details ORDER BY patient_id ASC";
        $result = mysqli_query($object->dbConnection(), $query);
        $recordsPerPage = 5;
        $totalPages = ceil($result->num_rows / $recordsPerPage);

        if (!isset($_GET['page'])) {
            $currentPage = 1;
        } else {
            $currentPage = intval($_GET['page']);
        }

        $startIndex = ($currentPage - 1) * $recordsPerPage;
        $query = "SELECT * FROM patient_details ORDER BY patient_id ASC LIMIT $startIndex, $recordsPerPage";
        $result = mysqli_query($object->dbConnection(), $query);


                                    
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<tr>
                                                    <td>" . $row['patient_id'] . "</td>
                                                    <td>" . $row['patient_name'] . "</td>
                                                    <td>" . $row['email_id'] . "</td>
                                                    <td>" . $row['dob'] . "</td>
                                                    <td>" . $row['contact_number'] . "</td>
                                                    <td>" . $row['gender'] . "</td>
                                                    
                                                </tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='8'>0 results</td></tr>";
                                    }
                                    ?>
                                </table>
								<nav aria-label="Page navigation" class="d-flex justify-content-center">
        <ul class="pagination">
            <?php
            for ($i = 1; $i <= $totalPages; $i++) {
                echo '<li class="page-item ' . ($currentPage == $i ? 'active' : '') . '">
                        <a class="page-link" href="?page=' . $i . '">' . $i . '</a>
                      </li>';
            }
            ?>
        </ul>
    </nav>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div id="footer" class=" mt-auto  ">

<?php include('adminfooter.php'); ?>
</div>



    <?php
} else {
    header("Location: login.php");
}
?>


</body>

</html>
