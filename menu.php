<style>
@import "https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700";
body {
    font-family: 'Poppins', sans-serif;
    background: #fafafa;
}

p {
    font-family: 'Poppins', sans-serif;
    font-size: 1.1em;
    font-weight: 300;
    line-height: 1.7em;
    color: #999;
}

a,
a:hover,
a:focus {
    color: inherit;
    text-decoration: none;
    transition: all 0.3s;
}

.navbar {
    padding: 15px 10px;
    background: #fff;
    border: none;
    border-radius: 0;
    margin-bottom: -10px; /* Adjust the margin-bottom value to move the sidebar up */
    box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
}

.navbar-btn {
    box-shadow: none;
    outline: none !important;
    border: none;
}

.line {
    width: 100%;
    height: 1px;
    border-bottom: 1px dashed #ddd;
    margin: 40px 0;
}

/* ---------------------------------------------------
    SIDEBAR STYLE
----------------------------------------------------- */

.wrapper {
    display: flex;
    width: 100%;
    align-items: stretch;
}

#sidebar {
    min-width: 250px;
    max-width: 250px;
    background: #7386D5;
    color: #fff;
    transition: all 0.3s;
}

#sidebar.active {
    margin-left: -250px;
}

#sidebar .sidebar-header {
    padding: 20px;
    background: #6d7fcc;
}

#sidebar ul.components {
    padding: 20px 0;
    border-bottom: 1px solid #47748b;
}

#sidebar ul p {
    color: #fff;
    padding: 10px;
}

#sidebar ul li a {
    padding: 10px;
    font-size: 1.1em;
    display: block;
}

#sidebar ul li a:hover {
    color: #7386D5;
    background: #fff;
}

#sidebar ul li.active>a,
a[aria-expanded="true"] {
    color: #fff;
    background: #6d7fcc;
}

a[data-toggle="collapse"] {
    position: relative;
}


ul ul a {
    font-size: 0.9em !important;
    padding-left: 30px !important;
    background: #6d7fcc;
}

ul.CTAs {
    padding: 30px;
}

ul.CTAs a {
    text-align: center;
    font-size: 0.9em !important;
    display: block;
    border-radius: 5px;
    margin-bottom: 5px;
}

a.download {
    background: #fff;
    color: #7386D5;
}

a.article,
a.article:hover {
    background: #6d7fcc !important;
    color: #fff !important;
}
/* ---------------------------------------------------
    MEDIAQUERIES
----------------------------------------------------- */

@media (max-width: 768px) {
    #sidebar {
        display: block; /* Show the sidebar on smaller screens */
        margin-left: 0; /* Remove margin to fill the full width on smaller screens */
    }
    #sidebar.active {
        margin-left: -250px; /* Hide the sidebar by sliding to the left */
    }
    #content {
        margin-left: 0; /* Adjust the content to fill the full width on smaller screens */
    }

    /* Show the menu button on smaller screens */
    #sidebarCollapse {
        display: block;
    }
}

@media (min-width: 769px) {
    #sidebar {
        display: block; /* Show the sidebar on larger screens */
    }
    #sidebar.active {
        margin-left: 0; /* Center the sidebar on larger screens (no sliding) */
    }
    #content {
        margin-left:5px; /* Adjust the content to leave space for the sidebar on larger screens */
    }

    /* Hide the menu button on larger screens (PC mode) */
    #sidebarCollapse {
        display: none;
    }
}
</style>


 <?php
// Start the session
if (!isset($_SESSION)) {
    session_start();
}

if (isset($_GET['id'])) {
    $doctor_id = $_GET['id'];
    $query = "SELECT * FROM doctor_details WHERE doctor_id = '" . $doctor_id . "'";
    $result = mysqli_query($object->dbConnection(), $query);

    if ($row = mysqli_fetch_assoc($result)) {
        $doctorName = $row['doctor_name'];
        $doctor_id = $row['doctor_id'];
        $_SESSION['doctor_id'] = $doctor_id;
    }

    if (isset($_SESSION["username"])) {
        $userName = $_SESSION["username"];
        $query = "SELECT * FROM patient_details WHERE email_id = '" . $userName . "'";
        $result = mysqli_query($object->dbConnection(), $query);

        if ($row = mysqli_fetch_assoc($result)) {
            $patient_id = $row['patient_id'];
            $patient_name = $row['patient_name'];
        } else {
            echo "Patient not found!";
        }
    } else {
        echo "Session username not set!";
    }
}
?>



<div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>My Health </h3>
            </div>

            <ul class="list-unstyled components">
                <li class="active">
                    <li>
                    <a href="home.php">Home</a>
                </li>
                <li>
                <?php
                if (isset($_SESSION["username"])) {
                    $userName = $_SESSION["username"];
                    $query = "SELECT * FROM patient_details WHERE email_id = '" . $userName . "'";
                    $result = mysqli_query($object->dbConnection(), $query);

                    if ($row = mysqli_fetch_assoc($result)) {
                        $patient_id = $row['patient_id'];
                        $patient_name = $row['patient_name'];
                        echo '<li><a href="profile.php?id=' . $patient_id . '">Profile</a></li>
						 <li> <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Appointment</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="search-doctors.php" >Book Appointment</a>
                        </li><li>
                            <a href="nextapp.php?id=' . $patient_id . '" >Upcoming  Appointment</a>
                        </li>
                        <li>
                            <a href="allapp.php?id=' . $patient_id . '"">Past Appointment </a>
                        </li>
                    
            </li>

                  
                        
                    </ul>
                </li>
                <li>
                    <a href="about.php">About</a>
                </li> 
				<li>
    <a href="contactus.php?id=' . $patient_id . '"">Contact Us</a>
                </li>
                
            </ul>';

           
		} else {
                        echo "Patient not found!";
                    }
                } else {
                    echo "Session username not set!";
                }
                ?>
    
        </nav>

        <!-- Page Content  -->
        <div id="content">

                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                        <span>Menu</span>
                    </button>
                                        
                </div>
				<script>
	$(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
	</script>

