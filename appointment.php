<!DOCTYPE html>
<html lang="en">
<head>
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
  <div id="calendar-container"></div>
  <div id="date-container">
    <h2>Select a Date and Time</h2>
    <form action="appointment_process.php" method="POST">
      <div class="form-group">
        <label for="name">Patient Name:</label>
        <input type="text" class="form-control" id="name" name="name" required>
      </div>
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="email" name="email" required>
      </div>
      <div class="form-group">
        <label for="date">Date:</label>
        <input type="text" class="form-control" id="selectedDate" name="date" readonly>
      </div>
    <div class="form-group">
        <label for="time">Time:</label>
        <div id="time-buttons">
          <!-- Time buttons will be dynamically generated based on the selected day -->
		   <button type="button" class="btn btn-info time-button" value="04:30:00">04.30 PM</button>
          <button type="button" class="btn btn-info time-button" value="05:00:00">05:00 PM</button>
          <button type="button" class="btn btn-info time-button" value="05:30:00">05:30 PM</button> 
		  <button type="button" class="btn btn-info time-button" value="06:00:00">06:00 PM</button>
          <button type="button" class="btn btn-info time-button" value="06:30:00">06:30 PM</button>
          <button type="button" class="btn btn-info time-button" value="07:00:00">07:00 PM</button> 
		  
        </div>
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

      $('#selectedTime').timepicker({
        timeFormat: 'hh:mm tt',
        interval: 60,
        dynamic: false,
        dropdown: true,
        scrollbar: true
      });
    });
  </script>
</body>
</html>
