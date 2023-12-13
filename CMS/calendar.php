<?php

include "connection.php";

include "nav.php";

?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
function confirmAndDelete(id) {
    if (confirm('Are you sure you want to delete this calendar info?')) {
        $.ajax({
            type: "GET",
            url: "calendar.php?deleteID=" + id,
            success: function (response) {
                location.reload(); // This will refresh the entire page
            }
        });
    }
}
</script>

<a style="margin: 20px 0;" class="btn btn-primary" href="add_calendar.php">Add Calendar</a>


<table class="table">
    <thead class="thead-light">
        <tr>
            <th scope="col">S.No</th>
            <th scope="col">Event From Date</th>
            <th scope="col">Event To Date</th>
            <th scope="col">Event Date Description</th>
            <th scope="col">Event Description</th>
            <th scope="col">Organization Code</th>
            <th scope="col">Event Name</th>
            <th scope="col">File Name</th>
            <th scope="col">Registration Link</th>
            <th scope="col">Venue Name</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $fetch = mysqli_query($conn, "SELECT * FROM cpd_calendar_info");
        while ($row = mysqli_fetch_array($fetch)) {
            echo "
                        <tr>
                            <td>$row[0]</td>
                            <td>$row[12]</td>
                            <td>$row[13]</td>
                            <td>$row[14]</td>
                            <td>$row[1]</td>
                            <td>$row[2]</td>
                            <td>$row[3]</td>
                            <td>$row[4]</td>
                            <td>$row[5]</td>
                            <td>$row[6]</td>
                            <td>
                                <a href='update_calendar.php?updateID=$row[0]' class='btn btn-success'>Update</a>
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
    $Dquery = mysqli_query($conn, "DELETE FROM cpd_calendar_info WHERE cal_id = '$DID'");
}




include "footer.php";


?>