<?php 

include "connection.php";

if (isset($_GET["updateID"])) {
    $uID = $_GET["updateID"];
    $fetchOneData = mysqli_query($conn, "SELECT * FROM cpd_catalog_info WHERE catalog_id = '$uID'");

    $row = mysqli_fetch_array($fetchOneData);
}

include "nav.php";


?>



<!-- Update Catalog Entry Form -->
<form method="post" action="">
    <div class="card pd-20 pd-sm-40">
        <h4 class="card-body-title">Update Catalog Entry</h4>

        <div class="form-layout">
            <div class="row mg-b-25">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Catalog Description: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" id="catalog_desc" name="catalog_desc" value="<?php echo $row[1] ?>"
                            placeholder="Enter Event Description" required>
                    </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                    <div class="form-group mg-b-10-force">
                        <label class="form-control-label">File Name: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="file" id="file_name" name="file_name" value="<?php echo $row[2] ?>"
                            placeholder="Enter File Name" required>
                    </div>
                </div><!-- col-4 -->
            </div><!-- row -->

            <div class="form-layout-footer">
                <!-- <button class="btn btn-info mg-r-5">Submit Form</button> -->
                <input class="btn btn-info mg-r-5" type="submit" value="Submit" name="btn-catalog-update">
                <input type="reset" class="btn btn-secondary" value="Cancel">
            </div><!-- form-layout-footer -->
        </div><!-- form-layout -->
    </div><!-- card -->
</form>





<?php

if (isset($_POST["btn-catalog-update"])) {
    $UIDS = $_GET["updateID"];
    $catalog_desc = mysqli_real_escape_string($conn, $_POST["catalog_desc"]);
    $file_name = mysqli_real_escape_string($conn, $_POST["file_name"]);
    $update_by = 1;


    $update_q = "UPDATE cpd_catalog_info SET catalog_desc= '$catalog_desc', file_name = '$file_name', update_by= $update_by, update_date= NOW(), active_check = 1
    WHERE catalog_id = '$UIDS'";
    $update_e = mysqli_query($conn, $update_q);

    if ($update_e > 0) {
        echo "Data Updated Succesfuly";
    } else {
        echo "<h1>Data Not Updated</h1>";
    }
}


include "footer.php";

?>