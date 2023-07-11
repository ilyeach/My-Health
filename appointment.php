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
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.10.0/jquery.timepicker.min.css">
  <title>Doctor Appointment Scheduling</title>
  <style>
    #calendar-container {
      width: 50%;
      float: left;
    }

    #date-container {
      width: 20%;
      float: left;
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
  // Check if the doctor's name query parameter is set
  if (isset($_GET['doctor'])) {
    // Retrieve the doctor's name from the query parameter
    $doctorName = $_GET['doctor'];

    // Use the doctor's name as needed in your code
    echo '<h3 style="font-size: 20px; text-align: left; margin-right: auto; margin-left: 1000px;">Doctor Name: ' . $doctorName . '</h3>';
  } else {
    // Redirect or display an error message if the doctor's name is not provided
    echo "Doctor's name not specified.";
  }
  ?>

  <div id="calendar-container"></div>
  <div id="date-container">
    <h2>Select a Date and Time</h2>
    <form action="appointment_process.php" method="POST">	
      <input type="hidden" name="doctorName" value="<?php echo $doctorName; ?>">
      <div class="form-group">
        <label for="name">Patient Name:</label>
        <input type="text" class="form-control" id="name" value="<?php echo $userName; ?>" name="name" required>
      </div>
      <div class="form-group">
        <label for="age">Age:</label>
        <input type="age" class="form-control" id="age" name="age" required>
      </div>
      <div class="form-group">
        <label for="date">Date:</label>
        <input type="text" class="form-control" id="selectedDate" name="date" readonly>
      </div>
      <div class="form-group">
        <label for="time">Time:</label>
        <div id="time-buttons">
          <!-- Time buttons will be dynamically generated based on the selected day -->
          <button type="button" class="btn btn-info time-button" value="04.30 PM" name="time">04.30 PM</button>
          <button type="button" class="btn btn-info time-button" value="05:00 PM" name="time">05:00 PM</button>
          <button type="button" class="btn btn-info time-button" value="05:30 PM" name="time">05:30 PM</button> 
          <button type="button" class="btn btn-info time-button" value="06:00 PM" name="time">06:00 PM</button>
          <button type="button" class="btn btn-info time-button" value="06:30 PM" name="time">06:30 PM</button>
          <button type="button" class="btn btn-info time-button" value="07:00 PM" name="time">07:00 PM</button> 
        </div>
      </div>
      <div class="form-group">
        <label for="selectedTime">Selected Time:</label>
        <input type="text" class="form-control" id="selectedTime" name="selectedTime" readonly>
      </div>
      <button type="submit" class="btn btn-primary">Schedule Appointment</button>
    </form>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.10.0/jquery.timepicker.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#calendar-container').fullCalendar({
        header: {
          left: 'prev,next today',
          center: 'title',
          right: 'month'
        },
        selectable: true,
        select: function(start, end) {
          var selectedDate = start.format('YYYY-MM-DD');
          $('#selectedDate').val(selectedDate);
        },
        validRange: function(nowDate) {
          return {
            start: nowDate.format('YYYY-MM-DD'),
            end: '9999-12-31' // Update the end date if needed
          };
        }
      });

      $('#time-buttons .time-button').click(function() {
        var selectedTime = $(this).val();
        $('#selectedTime').val(selectedTime);
      });
    });
  </script>
</body>
</html>
