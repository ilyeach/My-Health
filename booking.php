<!DOCTYPE html>
<html lang="en">
<?php include('admin/adminhead.php');
include('header.php'); ?>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <style>
    .datepicker {
      position: absolute;
      top: 0;
      left: -300px;
      z-index: 9999;
      display: none;
      padding: 4px;
      border: 1px solid #ccc;
      border-radius: 4px;
      background-color: #fff;
      width: 350px;
    }

    .datepicker table {
      width: 100%;
      font-size: 16px;
    }

    .datepicker table th,
    .datepicker table td {
      padding: 10px;
      text-align: center;
    }

    .datepicker table th {
      font-weight: bold;
    }

    .datepicker .datepicker-days th,
    .datepicker .datepicker-days td {
      width: 40px;
      height: 40px;
      line-height: 40px;
    }

    .datepicker .datepicker-switch {
      font-size: 18px;
      font-weight: bold;
    }

    .input-group.date {
      position: relative;
    }

    .available-time-buttons {
      display: flex;
      flex-wrap: wrap;
      justify-content: flex-end;
	  margin-right: 100px;
    }

    .available-time {
      display: inline-block;
      margin-right: 100px;
    }
  </style>
  <title>Appointment</title>
</head>
<body>
  <div class="container mt-5">
    <h1 class="text-center mb-4">Book an Appointment</h1>
    <div class="row justify-content-center">
      <div class="col-lg-6">
        <div class="form-group">
          <label for="date">Appointment Date</label>
          <div class="input-group date">
            <!-- Remove the input element -->
          </div>
        </div>
        <div class="form-group">
  <div class="row justify-content-end">
    <div class="col">
      <label for="time">Appointment Time</label>
    </div>
    <div class="col-auto">
      <div class="available-time-buttons">
        <button type="button" class="btn btn-primary">10 am</button>
        <button type="button" class="btn btn-primary">11 am</button>
      </div>
    </div>
  </div>
</div>

      </div>
    </div>
  </div>


  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
  <script>
    $(document).ready(function() {
      // Initialize datepicker
      $('.input-group.date').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
        todayHighlight: true
      });
      
      // Display available time slots as buttons
      $('.input-group.date').on('changeDate', function() {
        var selectedDate = $(this).datepicker('getFormattedDate');
        var availableTimes = getAvailableTimes(selectedDate); // Replace with your logic to fetch available times
        
        var timeButtons = '';
        for (var i = 0; i < availableTimes.length; i++) {
          timeButtons += '<button type="button" class="btn btn-primary available-time">' + availableTimes[i] + '</button>';
        }
        
        $('.available-time-buttons').html(timeButtons);
      });
      
      // Example function to fetch available times based on the selected date
      function getAvailableTimes(selectedDate) {
        // Replace this with your own logic to fetch available times from the server or a predefined list
        // This is just a placeholder example
        if (selectedDate === '2023-07-04') {
          return ['10.00 am', '11.00 am'];
        } else if (selectedDate === '2023-07-05') {
          return ['9.00 am', '10.00 am', '11.00 am'];
        } else {
          return [];
        }
      }
    });
  </script>
</body>
</html>
