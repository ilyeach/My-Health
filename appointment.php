<!DOCTYPE html>
<html lang="en">
<head>
  <?php 
    session_start();

    if ($_SESSION["username"]) { 
      include('head.php'); 
    }
  ?>
  <?php include('header.php'); ?>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
  <title>Doctor Appointment Scheduling</title>
  <style>
    #date-container {
      width: 20%;
      float:center;
      padding: 20px;
    }
	
    .time-button {
      margin-right: 10px;
      margin-bottom: 10px; /* Add margin-bottom for spacing */
    }
  </style>
</head>
<body>
  <?php 	
  if(isset($_GET['reg']) && ($_GET['reg'] == 1)){
    echo '<div class="alert alert-success text-center" role="alert"> Appointment Registered Successfully </div>';
  } elseif(isset($_GET['error']) && ($_GET['error'] == 1)){
    echo '<div class="alert alert-danger text-center" role="alert"> Appointment Not Registered  </div>';
  }

  if(isset($_GET['er']) && ($_GET['er'] == 1)){
    echo '<div class="alert alert-danger text-center" role="alert"> Appointment already exists </div>';
  }
  ?>
  <?php

if (isset($_GET['id'])) {
  $doctor_id = $_GET['id'];
  $query = "SELECT * FROM doctor_details WHERE doctor_id = '" . $doctor_id . "'";
  $result = mysqli_query($object->dbConnection(), $query);
  if ($row = mysqli_fetch_assoc($result)) {
    $doctorName = $row['doctor_name'];
    echo '<h3 class="text-center" style="font-size: 20px;">Booking Appointment For Doctor Name: ' . $doctorName . '</h3>';
  }

  //Assuming you have stored the username in the session variable  
 // $_SESSION["username"]
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
  
  $sql = "SELECT * FROM `appointment` WHERE doctor_id = " . $doctor_id . "";
  $res = mysqli_query($object->dbConnection(), $sql);
  while ($row = $res->fetch_assoc()) {
    $date = $row['appointment_date'];
    $time_of_day = $row['appointment_time_of_day'];
    $time = $row['appointment_time'];	
  }
}

?>

  <div id="container"></div>
<div class="d-flex justify-content-lg-center">  <div class="row">
                
    <form action="appointment_process.php" method="POST">
	      <input type="hidden" name="doctor_id" value="<?php echo $doctor_id; ?>">
	      <input type="hidden" name="patient_id" value="<?php echo $patient_id; ?>">

      <div class="form-group">
        <label for="name">Patient Name:</label>
        <input type="text" class="form-control" id="name" value="<?php echo $patient_name; ?>" name="name" readonly>
      </div>

      <div class="form-group">
  <label class="control-label" for="date">Date</label>
  <div class="input-group">
    <input class="form-control" id="date" name="date" placeholder="MM/DD/YYYY" type="text">
    <div class="input-group-append">
      <span class="input-group-text">
        <i class="fas fa-calendar-alt"></i>
      </span>
    </div>
  </div>
</div>

      <div class="form-group">
        <label for="selectedTime">Selected Time:</label>                  
                        <select class="form-control form-control-lg" name="selectedTime" id="selectedTime" required>
						<option value="">Select</option>
                          <option value="Morning">Morning</option>
                          <option value="Afternoon">Afternoon</option>
                          <option value="Evening">Evening</option>                     
                        </select>
                      </div>
<div class="form-group">
  <select class="form-control form-control-lg" name="timeOptions" id="timeOptions"></select>
</div>



      <button type="submit" class="btn btn-primary">Schedule Appointment</button>
    </form>
  </div>
  </div>

   
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
  <script>
  $(document).ready(function() {
    var date_input = $('input[name="date"]');
    // Make sure you have an input field with name="date" for the datepicker to target

    var options = {
      format: 'dd/mm/yyyy',
      todayHighlight: true,
      autoclose: true,
    };
  
    date_input.datepicker(options);
    // Initialize the datepicker with the provided options

    // Get the current date
    var currentDate = new Date();

    // Format the current date as "dd/mm/yyyy"
    var day = String(currentDate.getDate()).padStart(2, '0');
    var month = String(currentDate.getMonth() + 1).padStart(2, '0');
    var year = currentDate.getFullYear();
    var formattedDate = day + '/' + month + '/' + year;

    // Set the current date in the "date" input field
    date_input.val(formattedDate);

    // Add event listener for date selection
    date_input.on('changeDate', function() {
      // Get the selected date from the datepicker
      var selectedDate = date_input.datepicker('getFormattedDate');

      // Display an alert with the selected date
    //alert('Selected date: ' + selectedDate);
    });
  });
</script>
<script>
 let selectedTime = ""; // Initialize it with an empty string

  document.getElementById("selectedTime").addEventListener("change", function() {
    selectedTime = this.value; // Update the selectedTime variable with the selected value
    const timeOptions = document.getElementById("timeOptions");

    // Clear previous options
    timeOptions.innerHTML = "";

    if (selectedTime === "Morning") {
      const morningTimes = ["10.00 am", "10.15 am", "10.30 am", "10.45 am", "11.00 am"];

      // Add morning time options to the dropdown
      morningTimes.forEach(function(time) {
        const option = document.createElement("option");
        option.value = time;
        option.text = time;
        timeOptions.appendChild(option);
        showSelectedTime(time); // Call the function to display the selected time
      });
    } else if (selectedTime === "Afternoon") {
      const afternoonTimes = ["12.30 pm", "1.00 pm", "1.30 pm", "3.00 pm"];

      // Add afternoon time options to the dropdown
      afternoonTimes.forEach(function(time) {
        const option = document.createElement("option");
        option.value = time;
        option.text = time;
        timeOptions.appendChild(option);
        showSelectedTime(time); // Call the function to display the selected time
      });
    } else if (selectedTime === "Evening") {
      const eveningTimes = ["4.30 pm", "5.00 pm", "5.30 pm", "6.00 pm"];

      // Add evening time options to the dropdown
      eveningTimes.forEach(function(time) {
        const option = document.createElement("option");
        option.value = time;
        option.text = time;
        timeOptions.appendChild(option);
        showSelectedTime(time); // Call the function to display the selected time
      });
    }
  });
  


  // Function to display the selected time in an alert
  function showSelectedTime(time) {  
  //alert('Selected time of day: ' + time);}
</script>
 <script>
   function fetchAvailableTimeSlots(selectedDate, selectedTime) {
    $.ajax({
      type: "GET",
      url: "appointment.php",
      data: {
        'date': selectedDate,
        'time_of_day': time
      },
alert('Selected time of day: ' + data);
      success: function(data) {
        console.log(data); // Log the fetched data to the console
       // alert(data); // Display the fetched data in an alert box

        // Parse the JSON response
        const availableTimeSlots = JSON.parse(data);

        // Add fetched time options to the dropdown
        const timeOptions = document.getElementById("timeOptions");
        timeOptions.innerHTML = ""; // Clear previous options
        availableTimeSlots.forEach(function(time) {
          const option = document.createElement("option");
          option.value = time;
          option.text = time;
          timeOptions.appendChild(option);
        });

        // If no time options are available, disable the dropdown
        timeOptions.disabled = availableTimeSlots.length === 0;
      },
      error: function(xhr, status, error) {
        console.error(error); // Log the error in the console for debugging
      }
    });
  }

  $(document).ready(function() {
    // Other scripts and code...

    // Add event listener for date and time selection
    $('#date, #selectedTime').on('change', function() {
      // Get the selected date and time of day
      var selectedDate = $('#date').val();
      var selectedTime = $('#selectedTime').val();

      // Call the function to fetch available time slots
      fetchAvailableTimeSlots(selectedDate, selectedTime);
    });
  });
</script>
  <?php
// Simulated database query for available time slots based on the selected date and time of day
// Replace this with your actual database query

if (isset($_GET['date']) && isset($_GET['time_of_day'])) {
  $selectedDate = $_GET['date'];
  $selectedTimeOfDay = $_GET['time_of_day'];

  // Simulate the database response
  $availableTimeSlots = array();

  if ($selectedTimeOfDay === "Morning") {
    $availableTimeSlots = ["10.00 am", "10.15 am", "10.30 am", "10.45 am", "11.00 am"];
  } elseif ($selectedTimeOfDay === "Afternoon") {
    $availableTimeSlots = ["12.30 pm", "1.00 pm", "1.30 pm", "3.00 pm"];
  } elseif ($selectedTimeOfDay === "Evening") {
    $availableTimeSlots = ["4.30 pm", "5.00 pm", "5.30 pm", "6.00 pm"];
  }

  // Convert the result to JSON and send it back to the client
  echo json_encode(array_values($availableTimeSlots));
}
?>

</body>
</html>
