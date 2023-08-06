 <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="fullcalendar.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
  <link href="path/to/bootstrap-datepicker.min.css" rel="stylesheet">
<script src="path/to/bootstrap-datepicker.min.js"></script>

<script>
  $(document).ready(function() {
    var date_input = $('input[name="date"]');
    // Make sure you have an input field with name="date" for the datepicker to target

    var options = {
      format: 'dd/mm/yyyy',
      todayHighlight: true,
      autoclose: true,
      startDate: new Date() // Set the startDate to the current date
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
       // showSelectedTime(time); // Call the function to display the selected time
      });
    } else if (selectedTime === "Afternoon") {
      const afternoonTimes = ["12.30 pm", "1.00 pm", "1.30 pm", "3.00 pm"];

      // Add afternoon time options to the dropdown
      afternoonTimes.forEach(function(time) {
        const option = document.createElement("option");
        option.value = time;
        option.text = time;
        timeOptions.appendChild(option);
        //showSelectedTime(time); // Call the function to display the selected time
      });
    } else if (selectedTime === "Evening") {
      const eveningTimes = ["4.30 pm", "5.00 pm", "5.30 pm", "6.00 pm"];

      // Add evening time options to the dropdown
      eveningTimes.forEach(function(time) {
        const option = document.createElement("option");
        option.value = time;
        option.text = time;
        timeOptions.appendChild(option);
        //showSelectedTime(time); // Call the function to display the selected time
      });
    }
  });
  


  // Function to display the selected time in an alert
   // function showSelectedTime(time) {
    // alert('Selected time of day: ' + selectedTime);
  // }

  // Event listener for the "timeOptions" dropdown
  // document.getElementById("timeOptions").addEventListener("change", function() {
    // Get the selected time from the dropdown
    // const selectedOption = this.value;

 // alert('Selected time of day: ' + selectedOption);
    // Call the function to display the selected time in an alert

  // });
   
</script>
 <script>
  function fetchAvailableTimeSlots(selectedDate, selectedTime, selectedOption, doctor_id) {  
   $.ajax({
      type: "POST",
      url: "fetch_available_times.php",
      data: {
        'date': selectedDate,
		'selectedTime':selectedTime,
        'time_of_day': selectedOption,		
        'id': doctor_id		
      },
      success: function(response) {
		 
		  
		const timeOptionsDropdown = $('#timeOptions');

const timeSlotsArray = response.trim().split(/\,+/); 

      // Loop through the array and remove each corresponding option from the dropdown
      timeSlotsArray.forEach(function(timeSlot) {
        timeOptionsDropdown.find('option[value="' + timeSlot + '"]').remove();
      });
		  
      },
      error: function(xhr, status, error) {
        console.error(error); // Log the error in the console for debugging
      }
    });
  
  }
  $(document).ready(function() {
    // Other scripts and code...

    // Add event listener for date and time selection
    $('#date, #selectedTime, #selectedOption').on('change', function() {
      // Get the selected date and time of day
      var selectedDate = $('#date').val();
      var selectedTime = $('#selectedTime').val();
	  var selectedOption = $('#timeOptions').val();
	  var doctor_id = $('#doctor_id').val();
	 if(selectedOption != null){
	 fetchAvailableTimeSlots(selectedDate, selectedTime, selectedOption, doctor_id); 
	 }
	 
    });
  });
</script>
