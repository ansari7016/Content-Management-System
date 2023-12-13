<?php

include "connection.php";

if (isset($_GET["updateID"])) {
    $uID = $_GET["updateID"];
    $fetchOneData = mysqli_query($conn, "SELECT * FROM cpd_organization_info WHERE org_id = '$uID'");

    $row = mysqli_fetch_array($fetchOneData);
}

include "nav.php";

?>


<!-- Update Organization Form -->
<form method="post" action="">
    <div class="card pd-20 pd-sm-40">
        <h4 class="card-body-title">Update Organization</h4>

        <div class="form-layout">
            <div class="row mg-b-25">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Organization Name: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" id="org_name" name="org_name"
                            placeholder="Enter Organization Name" value="<?php echo $row[1] ?>" required>
                    </div>
                </div><!-- col-4 -->
            </div><!-- row -->

            <div class="form-layout-footer">
                <!-- <button class="btn btn-info mg-r-5">Submit Form</button> -->
                <input class="btn btn-info mg-r-5" type="submit" value="Submit" name="btn-update-org">
                <input type="reset" class="btn btn-secondary" value="Cancel">
            </div><!-- form-layout-footer -->
        </div><!-- form-layout -->
    </div><!-- card -->
</form>





<?php

if (isset($_POST["btn-update-org"])) {
    $UIDS = $_GET["updateID"];
    $org_name = mysqli_real_escape_string($conn, $_POST["org_name"]);
    $update_by = 1;


    $update_q = "UPDATE cpd_organization_info SET org_name='$org_name', update_by = $update_by, update_date = NOW(), active_check = 1
    WHERE org_id = '$UIDS'";
    $update_e = mysqli_query($conn, $update_q);
    
    if ($update_e) {
        header("location:organization.php");
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}

include "footer.php";

?>