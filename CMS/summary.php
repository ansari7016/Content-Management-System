<?php

include "connection.php";

include "nav.php";

?>

<br>

<!-- CPD Catalog & Calendar -->

<h4>CPD Catalog & Calendar</h4>

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td><strong>Title</strong></td>
            <td><strong>View</strong></td>
        </tr>
    </thead>
    <tbody>
        <?php

        // MySQL query to select specific columns
        $sql = "SELECT catalog_desc AS Title, file_name AS View FROM cpd_catalog_info";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "
            
            <tr>
                <td>$row[Title]</td>
                <td width='15%'>$row[View]</td>
            </tr>
            "
                ;
            }
        } else {
            echo "No results found.";
        }

        ?>
    </tbody>
</table>

<br>

<!-- CPD Calendar -->

<h4>CPD Calendar</h4>

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td><strong>Date</strong></td>
            <td><strong>Organized By</strong></td>
            <td><strong>Planned</strong></td>
            <td><strong>View Details</strong></td>
            <td><strong>Online Registration</strong></td>
            <td><strong>Venue</strong></td>
        </tr>
    </thead>
    <tbody>
        <?php

        // MySQL query to join two tables and select specific columns
        $sql = "SELECT 
        a.org_name AS OrganizedBy,
        b.cal_desc AS Planned,
        b.file_name AS ViewDetails,
        b.reg_link AS OnlineRegistration,
        b.venue_name AS Venue,
        CONCAT(b.event_from_date, ' to ', b.event_to_date) AS Date
    FROM 
        cpd_organization_info a,
        cpd_calendar_info b
    WHERE 
        a.org_id = b.cal_id;
              
";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "
            
            <tr>
                <td>$row[Date]</td>
                <td>$row[OrganizedBy]</td>
                <td>$row[Planned]</td>
                <td>$row[ViewDetails]</td>
                <td>$row[OnlineRegistration]</td>
                <td>$row[Venue]</td>
            </tr>
            "
                ;
            }
        } else {
            echo "No results found.";
        }

        ?>
    </tbody>
</table>

<br>


<!-- Events Held -->

<h4>Events Held</h4>

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td><strong>Date</strong></td>
            <td><strong>Title</strong></td>
            <td><strong>Venue</strong></td>
        </tr>
    </thead>
    <tbody>
        <?php

        // MySQL query to select specific columns
        $sql = "SELECT CONCAT(cpd_calendar_info.event_from_date, ' to ', cpd_calendar_info.event_to_date) AS Date, cpd_event_held.presenter_name AS Title, cpd_calendar_info.venue_name AS Venue
        FROM cpd_calendar_info
        JOIN cpd_event_held ON cpd_calendar_info.cal_id = cpd_event_held.cal_id;
        ";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "
            
            <tr>
                <td width='10%'>$row[Date]</td>
                <td>$row[Title]</td>
                <td width='15%'>$row[Venue]</td>
            </tr>
            "
                ;
            }
        } else {
            echo "No results found.";
        }

        ?>
    </tbody>
</table>




<?php include "footer.php"; ?>