<?php

include "connection.php";

include "nav.php";



// Condition to add a new event held entry
if (isset($_POST["btn-event-held"])) {
    $cal_id = $_POST["cal_id"];
    $presenter_name = mysqli_real_escape_string($conn, $_POST["presenter_name"]);
    $file_name = mysqli_real_escape_string($conn, $_POST["file_name"]);
    $enter_by = 1;

    $insert_q = "INSERT INTO `cpd_event_held`(`cal_id`, `presenter_name`, `file_name`, `enter_by`, `enter_date`) 
    VALUES ($cal_id, '$presenter_name', '$file_name', $enter_by, NOW())";

    $insert_e = mysqli_query($conn, $insert_q);

    if ($insert_e) { // Check for successful query execution
        header("location:event_held.php?message=Data Saved"); // Redirect with success message
        exit(); // Terminate the script after redirection
    } else {
        echo "Data not Saved: " . mysqli_error($conn); // Output error message
    }
}




?>




<!-- Add Event Held Form -->
<form method="post" action="">
    <div class="card pd-20 pd-sm-40">
        <h4 class="card-body-title">Add Event Held</h4>

        <div class="form-layout">
            <div class="row mg-b-25">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Calendar Id: <span class="tx-danger">*</span></label>
                        <select name="cal_id" id="cal_id" class="form-control">
                            <?php

                                $select_query = "SELECT cal_id, cal_desc FROM cpd_calendar_info";
                                $result = mysqli_query($conn, $select_query);

                                // Loop through the database results to generate options
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<option value='" . $row['cal_id'] . "'>" . $row['cal_desc'] . "</option>";
                                }

                            ?>
                        </select>
                    </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Presenter Name: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" id="presenter_name" name="presenter_name"
                            placeholder="Enter Presenter Name" required>
                    </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                    <div class="form-group mg-b-10-force">
                        <label class="form-control-label">File Name:</label>
                        <input class="form-control" type="file" id="file_name" name="file_name"
                            placeholder="Enter File Name">
                    </div>
                </div><!-- col-4 -->
            </div><!-- row -->

            <div class="form-layout-footer">
                <!-- <button class="btn btn-info mg-r-5">Submit Form</button> -->
                <input class="btn btn-info mg-r-5" type="submit" value="Submit" name="btn-event-held">
                <input type="reset" class="btn btn-secondary" value="Cancel">
            </div><!-- form-layout-footer -->
        </div><!-- form-layout -->
    </div><!-- card -->
</form>











<?php include "footer.php"; ?>