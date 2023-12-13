<?php
include "connection.php";
include "nav.php";
?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
function confirmAndDelete(id) {
    if (confirm('Are you sure you want to delete this organization?')) {
        $.ajax({
            type: "GET",
            url: "organization.php?deleteID=" + id,
            success: function (response) {
                location.reload(); // This will refresh the entire page
            }
        });
    }
}
</script>

<a style="margin: 20px 0;" class="btn btn-primary" href="add_organization.php">Add Organization</a>

<table class="table">
    <thead class="thead-light">
        <tr>
            <th scope="col">S.No</th>
            <th scope="col">Organization</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $fetch = mysqli_query($conn, "SELECT * FROM cpd_organization_info");
        while ($row = mysqli_fetch_array($fetch)) {
            echo "
                <tr>
                    <td>$row[0]</td>
                    <td>$row[1]</td>
                    <td>
                        <a href='update_organization.php?updateID=$row[0]' class='btn btn-success'>Update</a>
                        <a href='javascript:void(0);' onclick='confirmAndDelete($row[0])' class='btn btn-danger'>Delete</a>
                    </td>
                </tr>
            ";
        }
        ?>
    </tbody>
</table>

<?php
if (isset($_GET["deleteID"])) {
    $DID = $_GET["deleteID"];
    $Dquery = mysqli_query($conn, "DELETE FROM cpd_organization_info WHERE org_id = '$DID'");
}

include "footer.php";
?>