<?php

include "connection.php";

if (isset($_GET["updateID"])) {
    $uID = $_GET["updateID"];
    $fetchOneData = mysqli_query($conn, "SELECT * FROM `cpd_event_held` WHERE held_id = '$uID'");

    $row = mysqli_fetch_array($fetchOneData);
}

include "nav.php";

?>





<!-- Update Event Held Form -->
<form method="post" action="">
    <div class="card pd-20 pd-sm-40">
        <h4 class="card-body-title">Update Event Held</h4>

        <div class="form-layout">
            <div class="row mg-b-25">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Calendar Id:</label>
                        <select id="cal_id" name="cal_id" class="form-control">
                            <?php
                            // Fetch calendar IDs and descriptions from the database
                            $select_query = "SELECT cal_id, cal_desc FROM cpd_calendar_info";
                            $result = mysqli_query($conn, $select_query);

                            // Loop through the database results to generate options
                            while ($calendar = mysqli_fetch_assoc($result)) {
                                echo "<option value='" . $calendar['cal_id'] . "'";
                                // If the calendar ID matches the selected value, mark it as selected
                                if ($calendar['cal_id'] == $row['cal_id']) {
                                    echo " selected";
                                }
                                echo ">" . $calendar['cal_desc'] . "</option>";
                            }
                            ?>
                    </select>
                    </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Presenter Name: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" id="presenter_name" name="presenter_name" value="<?php echo $row[2] ?>"
                            placeholder="Enter Presenter Name" required>
                    </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                    <div class="form-group mg-b-10-force">
                        <label class="form-control-label">File Name:</label>
                        <input class="form-control" type="file" id="file_name" name="file_name" value="<?php echo $row[3] ?>"
                            placeholder="Enter File Name">
                    </div>
                </div><!-- col-4 -->
            </div><!-- row -->

            <div class="form-layout-footer">
                <!-- <button class="btn btn-info mg-r-5">Submit Form</button> -->
                <input class="btn btn-info mg-r-5" type="submit" value="Submit" name="btn-update-event">
                <input type="reset" class="btn btn-secondary" value="Cancel">
                <!-- <button class="btn btn-secondary">Cancel</button> -->
            </div><!-- form-layout-footer -->
        </div><!-- form-layout -->
    </div><!-- card -->
</form>





<?php 

if (isset($_POST["btn-update-event"])) {
    $UIDS = $_GET["updateID"];
    $cal_id = $_POST["cal_id"];
    $presenter_name = mysqli_real_escape_string($conn, $_POST["presenter_name"]);
    $file_name = mysqli_real_escape_string($conn, $_POST["file_name"]);
    $update_by = 1;


    $update_q = "UPDATE `cpd_event_held` SET `cal_id`= $cal_id, `presenter_name`= '$presenter_name', `file_name`=' $file_name' , `update_by`= $update_by,`update_date`= NOW() 
    WHERE held_id = '$UIDS'";
    $update_e = mysqli_query($conn, $update_q);

    if ($update_e > 0) {
        echo "<script> alert('Data Updated Successfully'); </script>";
    } else {
        echo "<h1>Data Not Updated</h1>";
    }
}

include "footer.php";

?>