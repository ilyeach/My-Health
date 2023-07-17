<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

  <style>
    #custom-datepicker .datepicker {
      width: 600px;
      height: 600px;
    }
  </style>
</head>

<body>
  <div class="container">
    <h1>Select Date and Time</h1>
    <div class="row">
      <div class="col-md-6">
        <div id="custom-datepicker"></div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="timepicker">Select Time:</label>
          <input type="text" class="form-control" id="timepicker" readonly>
        </div>
        <button id="bookBtn" class="btn btn-primary">Book Time</button>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
  <script>
    ('#eventCalendar').datepicker({
            dateFormat: 'yy-mm-dd',
            //dateFormat: 'd M yy',
            inline: true,
            minDate: 0,
            //minDate: '10-01-01',
            //minDate: '1 Jan 2010'
       }}.bind('dateSelected', function(e, selectedDate, $td) {
        Console.log(selectedDate);
    });
  </script>
</body>

</html>
