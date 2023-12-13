<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>CMS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet">
</head>

<body>

    <!-- header -->

    <body id="body-pd">
        <header class="header" id="header">
            <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
            <!-- <div class="header_img"> <img src="https://i.imgur.com/hczKIze.jpg" alt=""> </div> -->
        </header>
        <div class="l-navbar" id="nav-bar">
            <nav class="nav" id="navbar">
                <div>
                    <a href="#" class="nav_logo">
                        <i class='bx bx-layer nav_logo-icon'></i>
                        <span class="nav_logo-name">ICAP</span>
                    </a>
                    <div class="nav_list">
                        <a <?php if (isset($_GET['page']) && $_GET['page'] == 'index')
                            echo 'class="nav_link active"'; ?>
                            class="nav_link" href="index.php?page=index">
                            <i class='bx bx-grid-alt nav_icon'></i>
                            <span class="nav_name">Dashboard</span>
                        </a>
                        <a <?php if (isset($_GET['page']) && $_GET['page'] == 'organization')
                            echo 'class="nav_link active"'; ?> class="nav_link" href="organization.php?page=organization">
                            <i class='bx bx-group nav_icon'></i>
                            <span class="nav_name">Organization</span>
                        </a>
                        <a <?php if (isset($_GET['page']) && $_GET['page'] == 'catalog')
                            echo 'class="nav_link active"'; ?> class="nav_link" href="catalog.php?page=catalog">
                            <i class='bx bx-book-open nav_icon'></i>
                            <span class="nav_name">Catalog</span>
                        </a>
                        <a <?php if (isset($_GET['page']) && $_GET['page'] == 'calendar')
                            echo 'class="nav_link active"'; ?> class="nav_link" href="calendar.php?page=calendar">
                            <i class='bx bx-calendar nav_icon'></i>
                            <span class="nav_name">Calendar</span>
                        </a>
                        <a <?php if (isset($_GET['page']) && $_GET['page'] == 'event_held')
                            echo 'class="nav_link active"'; ?> class="nav_link" href="event_held.php?page=event_held">
                            <i class='bx bx-calendar-event nav_icon'></i>
                            <span class="nav_name">Events Held</span>
                        </a>
                        <a <?php if (isset($_GET['page']) && $_GET['page'] == 'summary')
                            echo 'class="nav_link active"'; ?> class="nav_link" href="summary.php?page=summary">
                            <i class='bx bx-clipboard nav_icon'></i>
                            <span class="nav_name">Summary</span>
                        </a>
                    </div>
                </div>
                <!-- <a href="#" class="nav_link"> 
                    <i class='bx bx-log-out nav_icon'></i> 
                    <span class="nav_name">SignOut</span> 
                </a> -->
            </nav>
        </div>

        <!--Container Main start-->
        <div class="height-100 bg-light">
            <h4>Content Management System</h4>