<form id="myForm">
  <input type="text" name="data" id="dataInput" placeholder="Enter data">
  <button type="submit">Insert</button>
</form>

<div id="dataContainer">
  <!-- Display inserted data here -->
</div>


<?php
// Connect to the database
include("config/db.php");

// Check if the data is provided
if (isset($_POST['data'])) {
  $data = $_POST['data'];

  // Insert the data into the database
  mysqli_query($con, "INSERT INTO post_like (username) VALUES ('$data')");
}
?>


<?php
// Connect to the database
include("config/db.php");

// Fetch the data from the database
$result = mysqli_query($con, "SELECT * FROM post_like");

// Loop through the data and display it
while ($row = mysqli_fetch_assoc($result)) {
  echo $row['username'] . "<br>";
}
?>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
  // Handle form submission
  $('#myForm').submit(function(e) {
    e.preventDefault(); // Prevent form submission and page reload

    var formData = $(this).serialize(); // Serialize form data

    // Send an AJAX request to insert.php
    $.ajax({
      url: 'insert.php',
      type: 'POST',
      data: formData,
      success: function() {
        // Clear the form input
        $('#dataInput').val('');

        // Update the data container
        $.ajax({
          url: 'display.php',
          type: 'GET',
          success: function(response) {
            $('#dataContainer').html(response);
          }
        });
      }
    });
  });

  // Initial data display
  $.ajax({
    url: 'display.php',
    type: 'GET',
    success: function(response) {
      $('#dataContainer').html(response);
    }
  });
});
</script>
