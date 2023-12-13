<?php
include "connection.php";

include "nav.php";

// Function to add a new calendar event
function addCalendarEvent($cal_desc, $org_code, $event_name, $file_name, $reg_link, $venue_name, $enter_by, $event_from_date, $event_to_date, $event_date_desc)
{
  global $conn;
  $cal_desc = $conn->real_escape_string($cal_desc);
  $event_name = $conn->real_escape_string($event_name);
  $file_name = $conn->real_escape_string($file_name);
  $reg_link = $conn->real_escape_string($reg_link);
  $venue_name = $conn->real_escape_string($venue_name);
  $event_from_date = $conn->real_escape_string($event_from_date);
  $event_to_date = $conn->real_escape_string($event_to_date);
  $event_date_desc = $conn->real_escape_string($event_date_desc);
  $org_code = (int) $org_code;
  $enter_by = (int) $enter_by;

  $sql = "INSERT INTO cpd_calendar_info (cal_desc, org_code, event_name, file_name, reg_link, venue_name, enter_by, enter_date, event_from_date, event_to_date, event_date_desc) 
  VALUES ('$cal_desc', $org_code, '$event_name', '$file_name', '$reg_link', '$venue_name', $enter_by, NOW(), '$event_from_date', '$event_to_date', '$event_date_desc')";


  if ($conn->query($sql) === TRUE) {
    // Redirect to calendar.php after successful insertion
    header("Location: calendar.php");
    exit(); // Make sure to exit after redirecting
  } else {
    return "Error: " . $conn->error;
  }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (isset($_POST['cal_desc'], $_POST['org_code'], $_POST['event_name'], $_POST['file_name'], $_POST['reg_link'], $_POST['venue_name'], $_POST['event_from_date'], $_POST['event_to_date'], $_POST['event_date_desc'])) {
    $cal_desc = $_POST['cal_desc'];
    $org_code = $_POST['org_code'];
    $event_name = $_POST['event_name'];
    $file_name = $_POST['file_name'];
    $reg_link = $_POST['reg_link'];
    $venue_name = $_POST['venue_name'];
    $event_from_date = $_POST['event_from_date'];
    $event_to_date = $_POST['event_to_date'];
    $event_date_desc = $_POST['event_date_desc'];
    $enter_by = 1; // Replace with the actual user ID or implement user authentication
    $message = addCalendarEvent($cal_desc, $org_code, $event_name, $file_name, $reg_link, $venue_name, $enter_by, $event_from_date, $event_to_date, $event_date_desc);
  }
}


?>

<!-- Add Calendar Event Form -->
<form method="post" action="">
  <div class="card pd-20 pd-sm-40">
    <h4 class="card-body-title">Add Calendar Event</h4>

    <div class="form-layout">
      <div class="row mg-b-25">
        <div class="col-lg-4">
          <div class="form-group">
            <label class="form-control-label">Event From Date: <span class="tx-danger">*</span></label>
            <input class="form-control" type="date" id="event_from_date" name="event_from_date"
              placeholder="Enter Event Description" required>
          </div>
        </div><!-- col-4 -->
        <div class="col-lg-4">
          <div class="form-group">
            <label class="form-control-label">Event To Date: <span class="tx-danger">*</span></label>
            <input class="form-control" type="date" id="event_to_date" name="event_to_date"
              placeholder="Enter Event Description" required>
          </div>
        </div><!-- col-4 -->
        <div class="col-lg-4">
          <div class="form-group">
            <label class="form-control-label">Event Date Description: <span class="tx-danger">*</span></label>
            <input class="form-control" type="text" id="event_date_desc" name="event_date_desc"
              placeholder="Enter Event Description" required>
          </div>
        </div><!-- col-4 -->
        <div class="col-lg-4">
          <div class="form-group">
            <label class="form-control-label">Event Description: <span class="tx-danger">*</span></label>
            <input class="form-control" type="text" id="cal_desc" name="cal_desc" placeholder="Enter Event Description"
              required>
          </div>
        </div><!-- col-4 -->
        <div class="col-lg-4">
          <div class="form-group">
            <label class="form-control-label">Organization Code: <span class="tx-danger">*</span></label>
            <input class="form-control" type="text" id="org_code" name="org_code" placeholder="Enter Organization Code"
              required>
          </div>
        </div><!-- col-4 -->
        <div class="col-lg-4">
          <div class="form-group">
            <label class="form-control-label">Event Name: <span class="tx-danger">*</span></label>
            <input class="form-control" type="text" id="event_name" name="event_name" placeholder="Enter Event Name"
              required>
          </div>
        </div><!-- col-4 -->
        <div class="col-lg-4">
          <div class="form-group mg-b-10-force">
            <label class="form-control-label">File Name:</label>
            <input class="form-control" type="file" id="file_name" name="file_name" placeholder="Enter File Name">
          </div>
        </div><!-- col-4 -->
        <div class="col-lg-4">
          <div class="form-group">
            <label class="form-control-label">Registration Link:</label>
            <input class="form-control" type="text" id="reg_link" name="reg_link" placeholder="Enter Registration Link">
          </div>
        </div><!-- col-4 -->
        <div class="col-lg-4">
          <div class="form-group">
            <label class="form-control-label">Venue Name: <span class="tx-danger">*</span></label>
            <input class="form-control" type="text" id="venue_name" name="venue_name" placeholder="Enter Venue Name"
              required>
          </div>
        </div><!-- col-4 -->
      </div><!-- row -->

      <div class="form-layout-footer">
        <!-- <button class="btn btn-info mg-r-5">Submit Form</button> -->
        <input class="btn btn-info mg-r-5" type="submit" value="Submit">
        <input type="reset" class="btn btn-secondary" value="Cancel">
      </div><!-- form-layout-footer -->
    </div><!-- form-layout -->
  </div><!-- card -->
</form>


<?php include "footer.php" ?>