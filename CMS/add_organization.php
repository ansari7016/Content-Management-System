<?php
include "connection.php";

include "nav.php";

// Function to add a new organization
function addOrganization($org_name, $enter_by)
{
    global $conn;
    $org_name = $conn->real_escape_string($org_name);
    $enter_by = (int) $enter_by;

    $sql = "INSERT INTO cpd_organization_info (org_name, enter_by, enter_date) VALUES ('$org_name', $enter_by, NOW())";

    if ($conn->query($sql) === TRUE) {
        header("Location: organization.php");
        exit();
    } else {
        return "Error: " . $conn->error;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['org_name'])) {
        $org_name = $_POST['org_name'];
        $enter_by = 1; // Replace with the actual user ID or implement user authentication
        $message = addOrganization($org_name, $enter_by);
    }
}

?>


<!-- Add Organization Form -->
<form method="post" action="">
    <div class="card pd-20 pd-sm-40">
        <h4 class="card-body-title">Add Organization</h4>

        <div class="form-layout">
            <div class="row mg-b-25">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Organization Name: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" id="org_name" name="org_name"
                            placeholder="Enter Organization Name" required>
                    </div>
                </div><!-- col-4 -->
            </div><!-- row -->

            <div class="form-layout-footer">
                <!-- <button class="btn btn-info mg-r-5">Submit Form</button> -->
                <input class="btn btn-info mg-r-5" type="submit" value="Submit" name="btn-organization">
                <input type="reset" class="btn btn-secondary" value="Cancel">
            </div><!-- form-layout-footer -->
        </div><!-- form-layout -->
    </div><!-- card -->
</form>


<?php include "footer.php" ?>