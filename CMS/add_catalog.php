<?php
include "connection.php";

include "nav.php";

// Condition to add a new catalog entry
if (isset($_POST["btn-catalog"])) {
    $catalog_desc = mysqli_real_escape_string($conn, $_POST["catalog_desc"]);
    $file_name = mysqli_real_escape_string($conn, $_POST["file_name"]);
    $enter_by = 1;

    $insert_q = "INSERT INTO `cpd_catalog_info`(`catalog_desc`, `file_name`, `enter_by`, `enter_date`, `active_check`) 
    VALUES ('$catalog_desc', '$file_name', $enter_by, NOW(), 1)";

    $insert_e = mysqli_query($conn, $insert_q);

    if ($insert_e > 0) {
        header("location:catalog.php?Data Saved");
    } else {
        echo "Data not Saved";
    }
}


?>


<!-- Add Catalog Entry Form -->
<form method="post" action="">
    <div class="card pd-20 pd-sm-40">
        <h4 class="card-body-title">Add Catalog Entry</h4>

        <div class="form-layout">
            <div class="row mg-b-25">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Catalog Description: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" id="catalog_desc" name="catalog_desc"
                            placeholder="Enter Event Description" required>
                    </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                    <div class="form-group mg-b-10-force">
                        <label class="form-control-label">File Name: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="file" id="file_name" name="file_name"
                            placeholder="Enter File Name" required>
                    </div>
                </div><!-- col-4 -->
            </div><!-- row -->

            <div class="form-layout-footer">
                <!-- <button class="btn btn-info mg-r-5">Submit Form</button> -->
                <input class="btn btn-info mg-r-5" type="submit" value="Submit" name="btn-catalog">
                <input type="reset" class="btn btn-secondary" value="Cancel">
            </div><!-- form-layout-footer -->
        </div><!-- form-layout -->
    </div><!-- card -->
</form>

<?php include "footer.php"; ?>