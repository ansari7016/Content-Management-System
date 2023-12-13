<?php

include "connection.php";

if (isset($_GET["updateID"])) {
    $uID = $_GET["updateID"];
    $fetchOneData = mysqli_query($conn, "SELECT * FROM `cpd_calendar_info` WHERE cal_id = '$uID'");

    $row = mysqli_fetch_array($fetchOneData);
}

include "nav.php";

?>


<!-- Update Calendar Event Form -->
<form method="post" action="">
    <div class="card pd-20 pd-sm-40">
        <h4 class="card-body-title">Update Calendar Event</h4>

        <div class="form-layout">
            <div class="row mg-b-25">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Event From Date: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="date" id="event_from_date" name="event_from_date" value="<?php echo $row[12] ?>"
                        placeholder="Enter Event Description" required>
                    </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                <div class="form-group">
                    <label class="form-control-label">Event To Date: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="date" id="event_to_date" name="event_to_date" value="<?php echo $row[13] ?>"
                    placeholder="Enter Event Description" required>
                </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                <div class="form-group">
                    <label class="form-control-label">Event Date Description: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" id="event_date_desc" name="event_date_desc" value="<?php echo $row[14] ?>"
                    placeholder="Enter Event Description" required>
                </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Event Description: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" id="cal_desc" name="cal_desc" value="<?php echo $row[1] ?>"
                            placeholder="Enter Event Description" required>
                    </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Organization Code: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" id="org_code" name="org_code" value="<?php echo $row[2] ?>"
                            placeholder="Enter Organization Code" required>
                    </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Event Name: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" id="event_name" name="event_name" value="<?php echo $row[3] ?>"
                            placeholder="Enter Event Name" required>
                    </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                    <div class="form-group mg-b-10-force">
                        <label class="form-control-label">File Name:</label>
                        <input class="form-control" type="file" id="file_name" name="file_name" value="<?php echo $row[4] ?>"
                            placeholder="Enter File Name">
                    </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Registration Link:</label>
                        <input class="form-control" type="text" id="reg_link" name="reg_link" value="<?php echo $row[5] ?>"
                            placeholder="Enter Registration Link">
                    </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Venue Name: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" id="venue_name" name="venue_name" value="<?php echo $row[6] ?>"
                            placeholder="Enter Venue Name" required>
                    </div>
                </div><!-- col-4 -->
            </div><!-- row -->

            <div class="form-layout-footer">
                <!-- <button class="btn btn-info mg-r-5">Submit Form</button> -->
                <input class="btn btn-info mg-r-5" type="submit" value="Submit" name="btn-update-cal">
                <input type="reset" class="btn btn-secondary" value="Cancel">
                <!-- <button class="btn btn-secondary">Cancel</button> -->
            </div><!-- form-layout-footer -->
        </div><!-- form-layout -->
    </div><!-- card -->
</form>





<?php

if (isset($_POST["btn-update-cal"])) {
    $UIDS = $_GET["updateID"];
    $cal_desc = mysqli_real_escape_string($conn, $_POST["cal_desc"]);
    $org_code = mysqli_real_escape_string($conn, $_POST["org_code"]);
    $event_name = mysqli_real_escape_string($conn, $_POST["event_name"]);
    $file_name = mysqli_real_escape_string($conn, $_POST["file_name"]);
    $reg_link = mysqli_real_escape_string($conn, $_POST["reg_link"]);
    $venue_name = mysqli_real_escape_string($conn, $_POST["venue_name"]);
    $event_from_date = mysqli_real_escape_string($conn, $_POST["event_from_date"]);
    $event_to_date = mysqli_real_escape_string($conn, $_POST["event_to_date"]);
    $event_date_desc = mysqli_real_escape_string($conn, $_POST["event_date_desc"]);
    $update_by = 1;


    $update_q = "UPDATE `cpd_calendar_info` SET `cal_desc`='$cal_desc',`org_code`='$org_code',`event_name`='$event_name',`file_name`='$file_name',`reg_link`='$reg_link',`venue_name`='$venue_name',`update_by`= $update_by,`update_date`= NOW(),`active_check`= 1, `event_from_date`='$event_from_date',`event_to_date`='$event_to_date',`event_date_desc`='$event_date_desc'
    WHERE cal_id = '$UIDS'";
    $update_e = mysqli_query($conn, $update_q);

    if ($update_e > 0) {
        echo "<script> alert('Data Updated Successfully'); </script>";
    } else {
        echo "<h1>Data Not Updated</h1>";
    }
}

include "footer.php";

?>