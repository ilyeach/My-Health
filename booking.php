<!DOCTYPE html>
<html lang="en">

<head>
  <?php include('head.php'); ?>
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
    }

    .available-time-buttons button {
      margin-right: 10px;
      margin-bottom: 10px;
    }

    .available-time-buttons button.booked {
      background-color: red;
      cursor: not-allowed;
    }

    /* Add the following CSS */
    .justify-content-end {
      justify-content: flex-end;
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
          <div class="input-group date"></div>
        </div>
        <div class="form-group">
          <div class="row justify-content-end">
            <div class="col">
              <label for="time">Appointment Time</label>
            </div>
            <div class="col-auto">
              <div class="available-time-buttons"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  
    $(document).ready(function() {
      // Initialize datepicker
      $('.input-group.date').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
        todayHighlight: true,
        startDate: '+0d' // Only allow present and future dates
      });

      // Display available time slots as buttons
      $('.input-group.date').on('changeDate', function() {
        var selectedDate = $('.input-group.date').datepicker('getFormattedDate');
        var availableTimes = getAvailableTimes(selectedDate); // Replace with your logic to fetch available times

        var timeButtons = '';
        for (var i = 0; i < availableTimes.length; i++) {
          var time = availableTimes[i];
          var buttonClass = 'btn btn-primary available-time';
          if (isTimeBooked(selectedDate, time)) {
            buttonClass += ' booked';
          }
          timeButtons += '<button type="button" class="' + buttonClass + '" data-time="' + time + '">' + time + '</button>';
        }

        $('.available-time-buttons').html(timeButtons);
      });

      // Handle click event on time buttons
      $(document).on('click', '.available-time', function() {
        var selectedDate = $('.input-group.date').datepicker('getFormattedDate');
        var selectedTime = $(this).data('time');
        storeAppointment(selectedDate, selectedTime);
      });

      // Example function to fetch available times based on the selected date
      function getAvailableTimes(selectedDate) {
        // Replace this with your own logic to fetch available times from the server or a predefined list
        // This is just a placeholder example
        var availableTimes = [
          '10:00 am',
          '11:00 am',
          '12:00 pm',
          '2:00 pm',
          '3:00 pm',
          '4:00 pm',
          '5:00 pm'
        ];

        return availableTimes;
      }

      // Example function to check if a time is booked
      function isTimeBooked(selectedDate, time) {
        // Replace this with your own logic to check if the time is booked on the selected date
        // This is just a placeholder example
        if (selectedDate === '2023-07-06' && time === '10:00 am') {
          return true;
        } else {
          return false;
        }
      }

      // Example function to store the appointment in the database
      function storeAppointment(selectedDate, selectedTime) {
        // Replace this with your logic to store the appointment in the database
        // This is just a placeholder example
        console.log('Selected Date:', selectedDate);
        console.log('Selected Time:', selectedTime);
      }
    });
  </script>
  <div id="footer">
    <?php include('footer.php'); ?>
  </div>
</body>

</html>
